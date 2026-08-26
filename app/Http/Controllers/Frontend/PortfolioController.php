<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Support\FrontendCache;
use App\Support\SiteCache;

class PortfolioController extends Controller
{
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
            'portfolio',
            $language->id,
            $slug,
            'frontend.portfolio.show',
            fn () => FrontendCache::portfolioShow($language->id, $slug)
        );

        return SiteCache::cachedHtmlResponse($html);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_show($category_name)
    {
        $language = getSiteLanguage();
        $page = (int) request()->get('page', 1);

        $html = FrontendCache::rememberShowHtml(
            'portfolio_category',
            $language->id,
            "{$category_name}.p{$page}",
            'frontend.portfolio.category-show',
            fn () => FrontendCache::portfolioCategory($language->id, $category_name, $page)
        );

        return SiteCache::cachedHtmlResponse($html);
    }
}
