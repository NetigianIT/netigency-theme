<?php

namespace App\Providers;

use App\Models\Admin\Language;
use App\Models\Admin\Message;
use App\Models\Admin\Page;
use App\Models\Admin\Section;
use App\Models\Admin\Seo;
use App\Models\Admin\SiteImage;
use App\Support\SiteCache;
use App\Support\SiteCacheInvalidator;
use App\Models\Frontend\Comment;
use App\View\Components\JetAuthenticationCard;
use App\View\Components\JetButton;
use App\View\Components\JetInput;
use App\View\Components\JetLabel;
use App\View\Components\JetValidationErrors;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('contact', function (Request $request) {
            $ip = (string) $request->ip();
            $email = strtolower(trim((string) $request->input('email')));

            $limits = [
                Limit::perMinute(3)->by('contact-ip:'.$ip),
                Limit::perHour(10)->by('contact-ip-hour:'.$ip),
                Limit::perMinute(30)->by('contact-global'),
            ];

            if ($email !== '') {
                $limits[] = Limit::perHour(5)->by('contact-email:'.$email);
            }

            return $limits;
        });

        RateLimiter::for('public-forms', function (Request $request) {
            $ip = (string) $request->ip();

            return [
                Limit::perMinute(8)->by('forms-ip:'.$ip),
                Limit::perHour(30)->by('forms-ip-hour:'.$ip),
            ];
        });

        // Register Jetstream components
        Blade::component('jet-authentication-card', JetAuthenticationCard::class);
        Blade::component('jet-validation-errors', JetValidationErrors::class);
        Blade::component('jet-label', JetLabel::class);
        Blade::component('jet-input', JetInput::class);
        Blade::component('jet-button', JetButton::class);

        // Allows using Bootstrap 4.x for paging. Normally Tailwindcss.
        Paginator::useBootstrap();

        $demo_mode = 'off'; // on/off
        View::share('demo_mode', $demo_mode);

        if (Schema::hasTable('languages')) {
            $languages = SiteCache::remember('site.languages', SiteCache::TTL_LONG, function () {
                return Language::get();
            });
            $display_dropdowns = SiteCache::remember('site.display_dropdowns', SiteCache::TTL_LONG, function () {
                return Language::where('display_dropdown', 1)->get();
            });
            $data_language = SiteCache::remember('site.data_language', SiteCache::TTL_LONG, function () {
                return Language::where('status', 1)->first();
            });

            View::share('languages', $languages);
            View::share('display_dropdowns', $display_dropdowns);
            View::share('data_language', $data_language);

            $language = SiteCache::remember('site.default_language', SiteCache::TTL_LONG, function () {
                return Language::where('default_site_language', 1)->first();
            });

            if (isset($language)) {
                View::share('language', $language);
            }
        }

        if (Schema::hasTable('site_images')) {
            $general_site_image = SiteCache::remember('site.site_image', SiteCache::TTL_MEDIUM, function () {
                return SiteImage::first();
            });
            View::share('general_site_image', $general_site_image);
        }

        if (Schema::hasTable('seos')) {
            $general_seo = SiteCache::remember('site.seo', SiteCache::TTL_MEDIUM, function () {
                return Seo::first();
            });
            View::share('general_seo', $general_seo);
        }

        if (Schema::hasTable('sections')) {
            $section_arr = SiteCache::remember('site.sections', SiteCache::TTL_MEDIUM, function () {
                $sections = Section::all();
                $arr = [];

                foreach ($sections as $section) {
                    $arr[$section->section] = $section->status;
                }

                return $arr;
            });

            if (count($section_arr) > 0) {
                View::share('section_arr', $section_arr);
            }
        }

        if (Schema::hasTable('messages')) {
            $general_recent_messages = SiteCache::remember('site.admin.recent_messages', SiteCache::TTL_SHORT, function () {
                return Message::orderBy('id', 'desc')->take(10)->get();
            });
            $general_unread_message_count = SiteCache::remember('site.admin.unread_message_count', SiteCache::TTL_SHORT, function () {
                return Message::where('read', 0)->count();
            });
            View::share('general_recent_messages', $general_recent_messages);
            View::share('general_unread_message_count', $general_unread_message_count);
        }

        if (Schema::hasTable('comments')) {
            $general_unread_comments = SiteCache::remember('site.admin.unread_comments', SiteCache::TTL_SHORT, function () {
                return Comment::where('approval', 0)->orderBy('id', 'desc')->take(4)->get();
            });
            $general_unread_comment_count = SiteCache::remember('site.admin.unread_comment_count', SiteCache::TTL_SHORT, function () {
                return Comment::where('approval', 0)->get();
            });
            View::share('general_unread_comments', $general_unread_comments);
            View::share('general_unread_comment_count', $general_unread_comment_count);
        }

        View::composer('layouts.frontend.master', function ($view) {
            if (! Schema::hasTable('pages')) {
                $view->with('header_pages', collect());

                return;
            }

            $language = getSiteLanguage();

            if (! $language) {
                $view->with('header_pages', collect());

                return;
            }

            $header_pages = SiteCache::remember("site.header_pages.{$language->id}", SiteCache::TTL_MEDIUM, function () use ($language) {
                return Page::where('language_id', $language->id)
                    ->where('display_header_menu', 1)
                    ->where('status', 1)
                    ->orderBy('order', 'asc')
                    ->get();
            });

            $view->with('header_pages', $header_pages);
        });

        SiteCacheInvalidator::register();
    }
}
