<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Support\FrontendCache;

class PortfolioController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $language = getSiteLanguage();

        $data = FrontendCache::portfolioShow($language->id, $slug);

        return view('frontend.portfolio.show', $data);
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

        $data = FrontendCache::portfolioCategory($language->id, $category_name, $page);

        return view('frontend.portfolio.category-show', $data);
    }
}
