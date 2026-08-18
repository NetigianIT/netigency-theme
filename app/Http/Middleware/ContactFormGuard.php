<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactFormGuard
{
    public function handle(Request $request, Closure $next): Response
    {
        if (trim((string) $request->input('website', '')) !== '') {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'message sent successfully',
                ]);
            }

            return redirect()->to('/#contact')
                ->with('success', 'frontend.your_message_has_been_delivered');
        }

        return $next($request);
    }
}
