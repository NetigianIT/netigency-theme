<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Support\FrontendCache;

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $language = getSiteLanguage();

        $data = FrontendCache::serviceShow($language->id, $slug);

        return view('frontend.service.show', $data);
    }
}
