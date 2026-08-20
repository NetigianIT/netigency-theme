<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $nonce = base64_encode(random_bytes(16));
        $request->attributes->set('cspNonce', $nonce);
        app()->instance('cspNonce', $nonce);

        /** @var Response $response */
        $response = $next($request);

        $this->applyHeaders($request, $response, $nonce);

        if (! $response instanceof StreamedResponse
            && ! $response instanceof BinaryFileResponse
            && $this->isHtmlResponse($response)
        ) {
            $this->protectHtml((string) $response->getContent(), $nonce, $response);
        }

        return $response;
    }

    protected function applyHeaders(Request $request, Response $response, string $nonce): void
    {
        $headers = $response->headers;

        $headers->set('X-Frame-Options', 'SAMEORIGIN');
        $headers->set('X-Content-Type-Options', 'nosniff');
        $headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=(), usb=()');
        $headers->set('Cross-Origin-Opener-Policy', 'same-origin');
        $headers->set('Cross-Origin-Resource-Policy', 'same-origin');
        $headers->set('X-XSS-Protection', '0');
        $headers->set('Content-Security-Policy', $this->csp($request, $nonce));

        if ($request->secure() || $request->headers->get('X-Forwarded-Proto') === 'https') {
            $headers->set('Strict-Transport-Security', 'max-age=63072000; includeSubDomains; preload');
        }
    }

    protected function csp(Request $request, string $nonce): string
    {
        $scriptSrc = [
            "'self'",
            "'nonce-{$nonce}'",
            'https://cdn.jsdelivr.net',
            'https://www.googletagmanager.com',
            'https://www.google-analytics.com',
            'https://www.google.com',
            'https://www.gstatic.com',
            'https://connect.facebook.net',
        ];

        $connectSrc = [
            "'self'",
            'https://www.google-analytics.com',
            'https://analytics.google.com',
            'https://region1.google-analytics.com',
            'https://stats.g.doubleclick.net',
            'https://www.googletagmanager.com',
            'https://cdn.jsdelivr.net',
            'https://www.facebook.com',
            'https://connect.facebook.net',
        ];

        $styleSrc = [
            "'self'",
            "'unsafe-inline'",
            'https://fonts.googleapis.com',
            'https://cdn.jsdelivr.net',
        ];

        $fontSrc = [
            "'self'",
            'data:',
            'https://fonts.gstatic.com',
            'https://cdn.jsdelivr.net',
        ];

        if (app()->environment('local')) {
            $vite = ['http://localhost:5173', 'http://127.0.0.1:5173', 'ws://localhost:5173', 'ws://127.0.0.1:5173'];
            $scriptSrc = array_merge($scriptSrc, $vite);
            $connectSrc = array_merge($connectSrc, $vite);
            $styleSrc = array_merge($styleSrc, $vite);
            $fontSrc = array_merge($fontSrc, $vite);
        }

        $directives = [
            "default-src 'self'",
            'base-uri '.$this->quote('self'),
            "object-src 'none'",
            "frame-ancestors 'self'",
            "form-action 'self'",
            'script-src '.implode(' ', $scriptSrc),
            'style-src '.implode(' ', $styleSrc),
            "img-src 'self' data: blob: https:",
            'font-src '.implode(' ', $fontSrc),
            'connect-src '.implode(' ', $connectSrc),
            "frame-src 'self' https://www.googletagmanager.com https://www.google.com https://td.doubleclick.net",
            "worker-src 'self' blob:",
            "media-src 'self' data: blob:",
            "manifest-src 'self'",
            "require-trusted-types-for 'script'",
            "trusted-types default goog#html goog#script tinymce tinymce#dom tinymce#xss literal-string 'allow-duplicates'",
        ];

        if ($request->secure() || $request->headers->get('X-Forwarded-Proto') === 'https') {
            $directives[] = 'upgrade-insecure-requests';
        }

        return implode('; ', $directives);
    }

    protected function protectHtml(string $html, string $nonce, Response $response): void
    {
        if ($html === '') {
            return;
        }

        $bootstrap = $this->bootstrapScript($nonce);

        if (stripos($html, '<head') !== false && ! str_contains($html, 'data-ni-security-bootstrap')) {
            $html = preg_replace(
                '/<head([^>]*)>/i',
                '<head$1>'.$bootstrap,
                $html,
                1
            ) ?? $html;
        }

        $html = preg_replace_callback(
            '/<script(\s[^>]*)?>/i',
            function (array $match) use ($nonce) {
                $attrs = $match[1] ?? '';
                if (preg_match('/\bnonce\s*=/i', $attrs)) {
                    return $match[0];
                }

                return '<script nonce="'.$nonce.'"'.$attrs.'>';
            },
            $html
        ) ?? $html;

        $response->setContent($html);
    }

    protected function bootstrapScript(string $nonce): string
    {
        $js = <<<'JS'
(function(){
  if(window.trustedTypes&&trustedTypes.createPolicy){
    try{
      trustedTypes.createPolicy('default',{
        createHTML:function(s){return s;},
        createScriptURL:function(s){return s;},
        createScript:function(s){return s;}
      });
    }catch(e){}
  }
  var n='%NONCE%';
  try{
    var orig=Document.prototype.createElement;
    Document.prototype.createElement=function(tag){
      var el=orig.call(this,tag);
      if(String(tag).toLowerCase()==='script'){el.setAttribute('nonce',n);}
      return el;
    };
  }catch(e){}
  function applyDeferredCss(){
    document.querySelectorAll('link[data-media-all]').forEach(function(link){
      link.media='all';
      link.removeAttribute('data-media-all');
    });
  }
  if(document.readyState==='loading'){
    document.addEventListener('DOMContentLoaded',applyDeferredCss);
  }else{
    applyDeferredCss();
  }
})();
JS;

        $js = str_replace('%NONCE%', $nonce, $js);

        return '<script nonce="'.$nonce.'" data-ni-security-bootstrap>'.$js.'</script>';
    }

    protected function isHtmlResponse(Response $response): bool
    {
        $contentType = (string) $response->headers->get('Content-Type', '');

        return str_contains($contentType, 'text/html');
    }

    protected function quote(string $value): string
    {
        return "'{$value}'";
    }
}
