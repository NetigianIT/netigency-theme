<?php

namespace App\Providers;

use App\Models\Admin\Language;
use App\Models\Admin\Message;
use App\Models\Admin\Page;
use App\Models\Admin\Section;
use App\Models\Admin\Seo;
use App\Models\Admin\SiteImage;
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

            // Retrieve a models
            $languages = Language::get();
            $display_dropdowns = Language::where('display_dropdown', 1)->get();
            $data_language = Language::where('status', 1)->first();

            View::share('languages', $languages);
            View::share('display_dropdowns', $display_dropdowns);
            View::share('data_language', $data_language);

            $language = Language::where('default_site_language', 1)->first();

            if (isset($language)) {

                View::share('language', $language);

            }

        }

        if (Schema::hasTable('site_images')) {
            // Retrieve the first model
            $general_site_image = SiteImage::first();
            View::share('general_site_image', $general_site_image);
        }

        if (Schema::hasTable('seos')) {
            // Retrieve the first model
            $general_seo = Seo::first();
            View::share('general_seo', $general_seo);
        }

        if (Schema::hasTable('sections')) {
            // Retrieve the first model
            $sections = Section::all();

            if (count($sections) > 0) {
                // For Section Enable/Disable
                foreach ($sections as $section) {
                    $section_arr[$section->section] = $section->status;
                }

                View::share('section_arr', $section_arr);
            }
        }

        if (Schema::hasTable('messages')) {
            // Retrieve messages
            $general_unread_messages = Message::where('read', 0)->orderBy('id', 'desc')->take(4)->get();
            $general_unread_message_count = Message::where('read', 0)->get();
            View::share('general_unread_messages', $general_unread_messages);
            View::share('general_unread_message_count', $general_unread_message_count);
        }

        if (Schema::hasTable('comments')) {
            // Retrieve messages
            $general_unread_comments = Comment::where('approval', 0)->orderBy('id', 'desc')->take(4)->get();
            $general_unread_comment_count = Comment::where('approval', 0)->get();
            View::share('general_unread_comments', $general_unread_comments);
            View::share('general_unread_comment_count', $general_unread_comment_count);
        }

        // Header pages menu for frontend layout (needed on every page, not only homepage)
        View::composer('layouts.frontend.master', function ($view) {
            if (! Schema::hasTable('pages')) {
                $view->with('header_pages', collect());

                return;
            }

            $language = getSiteLanguage();
            $header_pages = $language
                ? Page::where('language_id', $language->id)
                    ->where('display_header_menu', 1)
                    ->where('status', 1)
                    ->orderBy('order', 'asc')
                    ->get()
                : collect();

            $view->with('header_pages', $header_pages);
        });

    }
}
