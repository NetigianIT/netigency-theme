<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\ColorOption;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\QuickAccessButton;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Frontend\Comment;
use App\Support\FrontendCache;
use Illuminate\Http\Request;

class BlogController extends Controller
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

        $data = FrontendCache::blogsIndex($language->id, $page);

        return view('frontend.blog.index', $data);
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

        $data = FrontendCache::blogShow($language->id, $slug);

        Blog::where('id', $data['blog']->id)->increment('view');
        $data['blog']->view = ($data['blog']->view ?? 0) + 1;

        $data['comments'] = Comment::where('blog_id', $data['blog']->id)
            ->where('approval', 1)
            ->get();

        return view('frontend.blog.show', $data);
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

        $data = FrontendCache::blogCategory($language->id, $category_name, $page);

        return view('frontend.blog.category-show', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $language = getSiteLanguage();
        $search = $request->get('search');

        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $breadcrumb = Breadcrumb::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 1)->first();
        $quick_access_button = QuickAccessButton::first();

        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $blogs = Blog::join('categories', 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 1)
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('blogs.id', 'desc')
            ->get();

        return view('frontend.blog.search-index', compact(
            'site_info',
            'google_analytic',
            'socials',
            'breadcrumb',
            'external_url',
            'quick_access_button',
            'footer_pages',
            'blogs',
            'color_option'
        ));
    }
}
