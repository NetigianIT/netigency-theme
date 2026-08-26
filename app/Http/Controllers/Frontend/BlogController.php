<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Support\FrontendCache;
use App\Support\SiteCache;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $language = getSiteLanguage();
        $page = (int) request()->get('page', 1);

        $data = FrontendCache::blogsIndex($language->id, $page);

        return view('frontend.blog.index', $data);
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
            'blog',
            $language->id,
            $slug,
            'frontend.blog.show',
            function () use ($language, $slug) {
                $data = FrontendCache::blogShow($language->id, $slug);
                $data = array_merge($data, FrontendCache::blogComments($language->id, $data['blog']->id));

                return $data;
            }
        );

        // Do not block the response on view-count writes.
        dispatch(function () use ($language, $slug) {
            try {
                Blog::query()
                    ->where('language_id', $language->id)
                    ->where('slug', $slug)
                    ->where('status', 1)
                    ->increment('view');
            } catch (\Throwable $e) {
                // Ignore analytics write failures.
            }
        })->afterResponse();

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
            'blog_category',
            $language->id,
            "{$category_name}.p{$page}",
            'frontend.blog.category-show',
            fn () => FrontendCache::blogCategory($language->id, $category_name, $page)
        );

        return SiteCache::cachedHtmlResponse($html);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        $language = getSiteLanguage();
        $search = $request->get('search');

        $layout = FrontendCache::layout($language->id);

        $blogs = Blog::join('categories', 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 1)
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('blogs.id', 'desc')
            ->get();

        return view('frontend.blog.search-index', array_merge($layout, compact('blogs')));
    }
}
