<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Support\FrontendCache;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page_slug)
    {
        $language = getSiteLanguage();

        $data = FrontendCache::customPage($language->id, $page_slug);

        return view('frontend.page.show', $data);
    }
}
