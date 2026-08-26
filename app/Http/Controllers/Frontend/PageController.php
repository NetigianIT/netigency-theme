<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Support\FrontendCache;
use App\Support\SiteCache;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $page_slug
     * @return \Illuminate\Http\Response
     */
    public function show($page_slug)
    {
        $language = getSiteLanguage();

        $html = FrontendCache::rememberShowHtml(
            'page',
            $language->id,
            $page_slug,
            'frontend.page.show',
            fn () => FrontendCache::customPage($language->id, $page_slug)
        );

        return SiteCache::cachedHtmlResponse($html);
    }
}
