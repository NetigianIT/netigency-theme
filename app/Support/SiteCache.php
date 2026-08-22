<?php

namespace App\Support;

use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Admin\Counter;
use App\Models\Admin\Feature;
use App\Models\Admin\FrontendKeyword;
use App\Models\Admin\Language;
use App\Models\Admin\Message;
use App\Models\Admin\Page;
use App\Models\Admin\PanelKeyword;
use App\Models\Admin\Portfolio;
use App\Models\Admin\Service;
use App\Models\Admin\SkillInfoList;
use App\Models\Admin\Slider;
use App\Models\Admin\Social;
use App\Models\Admin\Subscribe;
use App\Models\Admin\Team;
use App\Models\Admin\Testimonial;
use App\Models\Admin\WorkProcess;
use App\Models\Frontend\Comment;
use Illuminate\Support\Facades\Cache;

class SiteCache
{
    public const TTL_LONG = 86400;

    public const TTL_MEDIUM = 3600;

    public const TTL_SHORT = 60;

    public static function remember(string $key, int $ttl, callable $callback)
    {
        return Cache::remember($key, $ttl, $callback);
    }

    /**
     * @var list<string>
     */
    public const FRONTEND_GROUPS = [
        'layout',
        'services',
        'service',
        'portfolio',
        'portfolio_category',
        'blogs',
        'blog',
        'blog_category',
        'page',
    ];

    public static function frontendVersion(string $group, int $languageId): int
    {
        return (int) Cache::rememberForever("site.frontend.version.{$group}.{$languageId}", fn () => 1);
    }

    public static function frontendRemember(string $group, int $languageId, string $suffix, int $ttl, callable $callback)
    {
        $version = static::frontendVersion($group, $languageId);
        $key = "site.frontend.{$group}.{$languageId}.v{$version}.{$suffix}";

        return static::remember($key, $ttl, $callback);
    }

    public static function bumpFrontendVersion(string $group, ?int $languageId = null): void
    {
        foreach (static::languageIds($languageId) as $id) {
            $key = "site.frontend.version.{$group}.{$id}";

            if (! Cache::has($key)) {
                Cache::forever($key, 1);
            }

            Cache::increment($key);
        }
    }

    public static function bumpAllFrontendVersions(?int $languageId = null): void
    {
        foreach (static::FRONTEND_GROUPS as $group) {
            static::bumpFrontendVersion($group, $languageId);
        }
    }

    protected static function languageIds(?int $languageId = null): array
    {
        if ($languageId) {
            return [$languageId];
        }

        return Language::query()->pluck('id')->all();
    }

    public static function language(?int $languageId): ?Language
    {
        if (! $languageId) {
            return null;
        }

        return static::remember("site.language.{$languageId}", static::TTL_LONG, function () use ($languageId) {
            return Language::query()->find($languageId);
        });
    }

    public static function defaultSiteLanguage(): ?Language
    {
        return static::remember('site.default_language', static::TTL_LONG, function () {
            return Language::query()->where('default_site_language', 1)->first();
        });
    }

    public static function defaultSiteLanguageId(): ?int
    {
        return optional(static::defaultSiteLanguage())->id;
    }

    public static function activeDataLanguage(): ?Language
    {
        return static::remember('site.data_language', static::TTL_LONG, function () {
            return Language::query()->where('status', 1)->first();
        });
    }

    public static function applyLanguageSession(Language $language): void
    {
        session([
            'language_id_from_dropdown' => $language->id,
            'language_name_from_dropdown' => $language->language_name,
            'language_code_from_dropdown' => $language->language_code,
            'language_direction_from_dropdown' => $language->direction,
        ]);
    }

    public static function languageCookie(Language $language)
    {
        return cookie(
            \App\Http\Middleware\SyncSiteLanguage::COOKIE,
            (string) $language->id,
            60 * 24 * 365,
            '/',
            null,
            false,
            false,
            false,
            'Lax'
        );
    }

    /**
     * Warm translation + layout caches so the next page load is fast.
     */
    public static function warmLanguage(int $languageId): void
    {
        static::language($languageId);
        static::panelKeywords($languageId);
        static::frontendKeywords($languageId);
        static::remember("site.header_pages.{$languageId}", static::TTL_MEDIUM, function () use ($languageId) {
            return \App\Models\Admin\Page::query()
                ->where('language_id', $languageId)
                ->where('display_header_menu', 1)
                ->where('status', 1)
                ->orderBy('order', 'asc')
                ->get();
        });
    }

    public static function warmAllLanguages(): void
    {
        foreach (Language::query()->pluck('id') as $languageId) {
            static::warmLanguage((int) $languageId);
        }
    }

    public static function flushLanguageMeta(): void
    {
        Cache::forget('site.languages');
        Cache::forget('site.display_dropdowns');
        Cache::forget('site.data_language');
        Cache::forget('site.default_language');

        foreach (Language::query()->pluck('id') as $languageId) {
            Cache::forget("site.language.{$languageId}");
        }
    }

    public static function panelKeywords(?int $languageId): array
    {
        if (! $languageId) {
            return [];
        }

        return static::remember("site.panel_keywords.{$languageId}", static::TTL_LONG, function () use ($languageId) {
            $keywords = [];

            PanelKeyword::query()
                ->where('language_id', $languageId)
                ->orderByDesc('id')
                ->get()
                ->unique('key')
                ->each(function (PanelKeyword $keyword) use (&$keywords) {
                    if ($keyword->value !== null && $keyword->value !== '') {
                        $keywords[$keyword->key] = $keyword->value;
                    }
                });

            return $keywords;
        });
    }

    public static function frontendKeywords(?int $languageId): array
    {
        if (! $languageId) {
            return [];
        }

        return static::remember("site.frontend_keywords.{$languageId}", static::TTL_LONG, function () use ($languageId) {
            $keywords = [];

            FrontendKeyword::query()
                ->where('language_id', $languageId)
                ->orderByDesc('id')
                ->get()
                ->unique('key')
                ->each(function (FrontendKeyword $keyword) use (&$keywords) {
                    if ($keyword->value !== null && $keyword->value !== '') {
                        $keywords[$keyword->key] = $keyword->value;
                    }
                });

            return $keywords;
        });
    }

    public static function flushAll(): void
    {
        Cache::flush();
    }

    public static function flushHomepage(?int $languageId = null): void
    {
        if ($languageId) {
            Cache::forget("site.homepage.{$languageId}");

            return;
        }

        static::forgetForAllLanguages('site.homepage.');
    }

    public static function flushHeaderPages(?int $languageId = null): void
    {
        if ($languageId) {
            Cache::forget("site.header_pages.{$languageId}");

            return;
        }

        static::forgetForAllLanguages('site.header_pages.');
    }

    public static function flushPanelKeywords(?int $languageId): void
    {
        if ($languageId) {
            Cache::forget("site.panel_keywords.{$languageId}");
        }
    }

    public static function flushFrontendKeywords(?int $languageId): void
    {
        if ($languageId) {
            Cache::forget("site.frontend_keywords.{$languageId}");
        }
    }

    public static function flushSections(): void
    {
        Cache::forget('site.sections');
    }

    public static function flushSiteImage(): void
    {
        Cache::forget('site.site_image');
    }

    public static function flushSeo(): void
    {
        Cache::forget('site.seo');
    }

    public static function flushTranslations(): void
    {
        foreach (Language::query()->pluck('id') as $languageId) {
            Cache::forget("site.panel_keywords.{$languageId}");
            Cache::forget("site.frontend_keywords.{$languageId}");
            Cache::forget("site.header_pages.{$languageId}");
            Cache::forget("site.homepage.{$languageId}");
        }

        Cache::forget('site.languages_warmed_v1');
    }

    public static function flushContent(): void
    {
        static::flushHomepage();
        static::flushHeaderPages();
        static::flushSections();
        static::flushSiteImage();
        static::flushSeo();
        static::flushDashboardCounts();
        static::bumpAllFrontendVersions();
    }

    public static function dashboardCounts(): array
    {
        return static::remember('site.admin.dashboard_counts', static::TTL_MEDIUM, function () {
            return [
                'portfolios_count' => Portfolio::count(),
                'features_count' => Feature::count(),
                'work_processes_count' => WorkProcess::count(),
                'skills_count' => SkillInfoList::count(),
                'testimonials_count' => Testimonial::count(),
                'teams_count' => Team::count(),
                'blogs_count' => Blog::count(),
                'messages_count' => Message::count(),
                'services_count' => Service::count(),
                'counters_count' => Counter::count(),
                'subscribers_count' => Subscribe::count(),
                'comments_count' => Comment::count(),
                'sliders_count' => Slider::count(),
                'pages_count' => Page::count(),
                'categories_count' => Category::count(),
                'socials_count' => Social::count(),
            ];
        });
    }

    public static function flushDashboardCounts(): void
    {
        Cache::forget('site.admin.dashboard_counts');
    }

    public static function flushAdminNotifications(): void
    {
        Cache::forget('site.admin.recent_messages');
        Cache::forget('site.admin.unread_message_count');
        Cache::forget('site.admin.unread_comments');
        Cache::forget('site.admin.unread_comment_count');
        static::flushDashboardCounts();
    }

    protected static function forgetForAllLanguages(string $prefix): void
    {
        foreach (Language::query()->pluck('id') as $languageId) {
            Cache::forget($prefix.$languageId);
        }
    }
}
