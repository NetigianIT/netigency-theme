<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Support\FrontendCache;
use App\Support\SiteCache;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = getSiteLanguage();
        $page = (int) request()->get('page', 1);

        $data = FrontendCache::servicesIndex($language->id, $page);

        return view('frontend.service.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $language = getSiteLanguage();

        $html = FrontendCache::rememberShowHtml(
            'service',
            $language->id,
            $slug,
            'frontend.service.show',
            fn () => FrontendCache::serviceShow($language->id, $slug)
        );

        return SiteCache::cachedHtmlResponse($html);
    }
}
