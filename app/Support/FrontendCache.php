<?php

namespace App\Support;

use App\Models\Admin\Blog;
use App\Models\Admin\BlogPaginate;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\Category;
use App\Models\Admin\ColorOption;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioDetail;
use App\Models\Admin\PortfolioSlider;
use App\Models\Admin\QuickAccessButton;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceDetail;
use App\Models\Admin\ServicePaginate;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use Illuminate\Support\Facades\DB;

class FrontendCache
{
    public static function layout(int $languageId): array
    {
        return SiteCache::frontendRemember('layout', $languageId, 'base', SiteCache::TTL_MEDIUM, function () use ($languageId) {
            return [
                'site_info' => SiteInfo::where('language_id', $languageId)->first(),
                'google_analytic' => GoogleAnalytic::first(),
                'socials' => Social::where('status', 1)->get(),
                'color_option' => ColorOption::first(),
                'breadcrumb' => Breadcrumb::first(),
                'external_url' => ExternalUrl::where('language_id', $languageId)->where('status', 1)->first(),
                'quick_access_button' => QuickAccessButton::first(),
                'footer_pages' => Page::where('language_id', $languageId)
                    ->where('display_header_menu', 0)
                    ->where('status', 1)
                    ->orderBy('order', 'asc')
                    ->get(),
            ];
        });
    }

    public static function servicesIndex(int $languageId, int $page = 1): array
    {
        $data = static::layout($languageId);

        $pageData = SiteCache::frontendRemember('services', $languageId, "p{$page}", SiteCache::TTL_MEDIUM, function () use ($languageId) {
            $limit = optional(ServicePaginate::first())->paginate ?? 9;

            $services = Service::where('language_id', $languageId)
                ->where('status', 1)
                ->orderBy('id', 'desc')
                ->paginate($limit);

            return compact('services');
        });

        return array_merge($data, $pageData);
    }

    public static function serviceShow(int $languageId, string $slug): array
    {
        $data = static::layout($languageId);

        $pageData = SiteCache::frontendRemember('service', $languageId, $slug, SiteCache::TTL_MEDIUM, function () use ($languageId, $slug) {
            $service = Service::where('services.service_slug', $slug)->firstOrFail();
            $details = ServiceDetail::where('service_id', $service->id)->get();
            $recent_posts = static::recentPosts($languageId, 3);

            return compact('service', 'details', 'recent_posts');
        });

        return array_merge($data, $pageData);
    }

    public static function portfolioShow(int $languageId, string $slug): array
    {
        $data = static::layout($languageId);

        $pageData = SiteCache::frontendRemember('portfolio', $languageId, $slug, SiteCache::TTL_MEDIUM, function () use ($languageId, $slug) {
            $portfolio = Portfolio::where('portfolios.portfolio_slug', $slug)->firstOrFail();
            $details = PortfolioDetail::where('portfolio_id', $portfolio->id)->get();
            $sliders = PortfolioSlider::where('portfolio_id', $portfolio->id)->get();
            $recent_posts = static::recentPosts($languageId, 3);
            $portfolio_count_categories = Portfolio::select(DB::raw('count(*) as category_count, category_id'))
                ->where('language_id', $languageId)
                ->where('portfolios.status', 1)
                ->groupBy('category_id')
                ->get();

            return compact('portfolio', 'details', 'sliders', 'recent_posts', 'portfolio_count_categories');
        });

        return array_merge($data, $pageData);
    }

    public static function portfolioCategory(int $languageId, string $categorySlug, int $page = 1): array
    {
        $data = static::layout($languageId);

        $pageData = SiteCache::frontendRemember('portfolio_category', $languageId, "{$categorySlug}.p{$page}", SiteCache::TTL_MEDIUM, function () use ($languageId, $categorySlug) {
            $portfolios = Portfolio::join('portfolio_categories', 'portfolio_categories.id', '=', 'portfolios.category_id')
                ->where('portfolio_categories.language_id', $languageId)
                ->where('portfolio_categories.portfolio_category_slug', $categorySlug)
                ->where('portfolios.status', 1)
                ->orderBy('portfolios.id', 'desc')
                ->paginate(9);

            if ($portfolios->isEmpty()) {
                abort(404);
            }

            $category = PortfolioCategory::where('language_id', $languageId)
                ->where('portfolio_category_slug', $categorySlug)
                ->first();

            return compact('portfolios', 'category');
        });

        return array_merge($data, $pageData);
    }

    public static function blogsIndex(int $languageId, int $page = 1): array
    {
        $data = static::layout($languageId);

        $pageData = SiteCache::frontendRemember('blogs', $languageId, "p{$page}", SiteCache::TTL_MEDIUM, function () use ($languageId) {
            $limit = optional(BlogPaginate::first())->grid_view_paginate ?? 9;

            $blogs = Blog::join('categories', 'categories.id', '=', 'blogs.category_id')
                ->where('categories.language_id', $languageId)
                ->where('categories.status', 1)
                ->where('blogs.status', 1)
                ->orderBy('blogs.id', 'desc')
                ->paginate($limit);

            return compact('blogs');
        });

        return array_merge($data, $pageData);
    }

    public static function blogShow(int $languageId, string $slug): array
    {
        $data = static::layout($languageId);

        $pageData = SiteCache::frontendRemember('blog', $languageId, $slug, SiteCache::TTL_MEDIUM, function () use ($languageId, $slug) {
            $blog = Blog::where('blogs.slug', $slug)->firstOrFail();
            $recent_posts = static::recentPosts($languageId, 3);
            $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
                ->where('language_id', $languageId)
                ->where('blogs.status', 1)
                ->groupBy('category_id')
                ->get();

            return compact('blog', 'recent_posts', 'blog_count_categories');
        });

        return array_merge($data, $pageData);
    }

    public static function blogCategory(int $languageId, string $categorySlug, int $page = 1): array
    {
        $data = static::layout($languageId);

        $pageData = SiteCache::frontendRemember('blog_category', $languageId, "{$categorySlug}.p{$page}", SiteCache::TTL_MEDIUM, function () use ($languageId, $categorySlug) {
            $blogs = Blog::join('categories', 'categories.id', '=', 'blogs.category_id')
                ->where('categories.language_id', $languageId)
                ->where('categories.category_slug', $categorySlug)
                ->where('blogs.status', 1)
                ->orderBy('blogs.id', 'desc')
                ->paginate(6);

            if ($blogs->isEmpty()) {
                abort(404);
            }

            $category = Category::where('language_id', $languageId)
                ->where('category_slug', $categorySlug)
                ->first();

            return compact('blogs', 'category');
        });

        return array_merge($data, $pageData);
    }

    public static function customPage(int $languageId, string $pageSlug): array
    {
        $data = static::layout($languageId);

        $pageData = SiteCache::frontendRemember('page', $languageId, $pageSlug, SiteCache::TTL_MEDIUM, function () use ($pageSlug) {
            $page = Page::where('pages.page_slug', $pageSlug)->firstOrFail();

            return compact('page');
        });

        return array_merge($data, $pageData);
    }

    protected static function recentPosts(int $languageId, int $limit)
    {
        return Blog::join('categories', 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $languageId)
            ->where('categories.status', 1)
            ->where('blogs.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->take($limit)
            ->get();
    }
}
