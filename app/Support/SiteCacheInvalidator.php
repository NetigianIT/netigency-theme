<?php

namespace App\Support;

use App\Models\Admin\About;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogPaginate;
use App\Models\Admin\BlogSection;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\Category;
use App\Models\Admin\ColorOption;
use App\Models\Admin\Contact;
use App\Models\Admin\ContactSection;
use App\Models\Admin\Counter;
use App\Models\Admin\CounterSection;
use App\Models\Admin\Feature;
use App\Models\Admin\FeatureSection;
use App\Models\Admin\FixedContent;
use App\Models\Admin\FrontendKeyword;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\HomepageVersion;
use App\Models\Admin\InfoList;
use App\Models\Admin\Language;
use App\Models\Admin\Message;
use App\Models\Admin\Page;
use App\Models\Admin\PanelKeyword;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioDetail;
use App\Models\Admin\PortfolioSection;
use App\Models\Admin\PortfolioSlider;
use App\Models\Admin\QuickAccessButton;
use App\Models\Admin\Section;
use App\Models\Admin\Seo;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceDetail;
use App\Models\Admin\ServicePaginate;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SiteImage;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillInfoList;
use App\Models\Admin\Slider;
use App\Models\Admin\Social;
use App\Models\Admin\Team;
use App\Models\Admin\TeamSection;
use App\Models\Admin\Testimonial;
use App\Models\Admin\TestimonialSection;
use App\Models\Admin\Video;
use App\Models\Admin\VideoCategory;
use App\Models\Admin\VideoItem;
use App\Models\Admin\WorkProcess;
use App\Models\Admin\WorkProcessSection;
use App\Models\Frontend\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class SiteCacheInvalidator
{
    /**
     * @var array<class-string<Model>, list<string>>
     */
    protected static array $rules = [
        About::class => ['homepage', 'frontend_layout'],
        InfoList::class => ['homepage'],
        Feature::class => ['homepage'],
        FeatureSection::class => ['homepage'],
        Service::class => ['homepage', 'frontend_services', 'frontend_service'],
        ServiceSection::class => ['homepage', 'frontend_services'],
        ServiceDetail::class => ['frontend_service'],
        ServicePaginate::class => ['homepage_all', 'frontend_services'],
        Counter::class => ['homepage'],
        CounterSection::class => ['homepage'],
        WorkProcess::class => ['homepage'],
        WorkProcessSection::class => ['homepage'],
        Skill::class => ['homepage'],
        SkillInfoList::class => ['homepage'],
        PortfolioCategory::class => ['homepage', 'frontend_portfolio_category'],
        Portfolio::class => ['homepage', 'frontend_portfolio'],
        PortfolioSection::class => ['homepage', 'frontend_portfolio'],
        PortfolioDetail::class => ['frontend_portfolio'],
        PortfolioSlider::class => ['frontend_portfolio'],
        Team::class => ['homepage'],
        TeamSection::class => ['homepage'],
        Testimonial::class => ['homepage'],
        TestimonialSection::class => ['homepage'],
        Blog::class => ['homepage', 'frontend_blogs', 'frontend_blog'],
        BlogSection::class => ['homepage', 'frontend_blogs'],
        BlogPaginate::class => ['homepage_all', 'frontend_blogs'],
        Category::class => ['homepage', 'frontend_blogs', 'frontend_blog_category'],
        VideoCategory::class => ['frontend_layout'],
        VideoItem::class => ['frontend_layout'],
        Contact::class => ['homepage', 'frontend_layout'],
        ContactSection::class => ['homepage'],
        FixedContent::class => ['homepage'],
        Slider::class => ['homepage'],
        SiteInfo::class => ['homepage', 'frontend_layout'],
        Video::class => ['homepage_all'],
        HomepageVersion::class => ['homepage_all'],
        QuickAccessButton::class => ['homepage_all', 'frontend_layout'],
        GoogleAnalytic::class => ['homepage_all', 'frontend_layout'],
        ColorOption::class => ['homepage_all', 'frontend_layout'],
        Social::class => ['homepage_all', 'frontend_layout'],
        Page::class => ['homepage', 'header_pages', 'frontend_page', 'frontend_layout'],
        Section::class => ['sections'],
        SiteImage::class => ['site_image', 'frontend_layout'],
        Seo::class => ['seo', 'frontend_layout'],
        PanelKeyword::class => ['panel_keywords'],
        FrontendKeyword::class => ['frontend_keywords', 'frontend_html'],
        Language::class => ['language'],
        Message::class => ['admin_messages'],
        Comment::class => ['admin_comments', 'frontend_blog'],
        Breadcrumb::class => ['frontend_layout'],
    ];

    public static function register(): void
    {
        if (! SiteCache::tableExists('languages')) {
            return;
        }

        foreach (static::$rules as $modelClass => $actions) {
            static::watch($modelClass, $actions);
        }

        foreach (glob(app_path('Models/Admin/*.php')) ?: [] as $file) {
            $modelClass = 'App\\Models\\Admin\\'.basename($file, '.php');

            if (! class_exists($modelClass) || isset(static::$rules[$modelClass])) {
                continue;
            }

            static::watch($modelClass, ['content']);
        }
    }

    /**
     * @param  list<string>  $actions
     */
    protected static function watch(string $modelClass, array $actions): void
    {
        if (! class_exists($modelClass)) {
            return;
        }

        $callback = function (Model $model) use ($actions) {
            static::invalidate($model, $actions);
            SiteCache::flushDashboardCounts();
        };

        $modelClass::saved($callback);
        $modelClass::deleted($callback);
    }

    /**
     * @param  list<string>  $actions
     */
    public static function invalidate(Model $model, ?array $actions = null): void
    {
        $actions = $actions ?? static::$rules[$model::class] ?? ['content'];

        foreach ($actions as $action) {
            static::apply($action, $model);
        }
    }

    protected static function apply(string $action, Model $model): void
    {
        $languageId = static::languageId($model);

        match ($action) {
            'homepage' => SiteCache::flushHomepage($languageId),
            'homepage_all' => SiteCache::flushHomepage(),
            'header_pages' => SiteCache::flushHeaderPages($languageId),
            'panel_keywords' => $languageId ? SiteCache::flushPanelKeywords($languageId) : SiteCache::flushTranslations(),
            'frontend_keywords' => static::flushFrontendKeywords($languageId),
            'language' => static::flushLanguage($languageId),
            'sections' => static::flushSections(),
            'site_image' => SiteCache::flushSiteImage(),
            'seo' => SiteCache::flushSeo(),
            'admin_messages' => SiteCache::flushAdminNotifications(),
            'admin_comments' => SiteCache::flushAdminNotifications(),
            'frontend_layout' => SiteCache::bumpFrontendVersion('layout', $languageId),
            'frontend_services' => SiteCache::bumpFrontendVersion('services', $languageId),
            'frontend_service' => SiteCache::bumpFrontendVersion('service', $languageId),
            'frontend_portfolio' => SiteCache::bumpFrontendVersion('portfolio', $languageId),
            'frontend_portfolio_category' => SiteCache::bumpFrontendVersion('portfolio_category', $languageId),
            'frontend_blogs' => SiteCache::bumpFrontendVersion('blogs', $languageId),
            'frontend_blog' => SiteCache::bumpFrontendVersion('blog', $languageId),
            'frontend_blog_category' => SiteCache::bumpFrontendVersion('blog_category', $languageId),
            'frontend_page' => SiteCache::bumpFrontendVersion('page', $languageId),
            'frontend_html' => SiteCache::bumpAllFrontendVersions($languageId),
            'content' => SiteCache::flushContent(),
            default => SiteCache::flushContent(),
        };
    }

    protected static function flushFrontendKeywords(?int $languageId): void
    {
        if ($languageId) {
            SiteCache::flushFrontendKeywords($languageId);
            SiteCache::bumpAllFrontendVersions($languageId);

            return;
        }

        SiteCache::flushTranslations();
        SiteCache::bumpAllFrontendVersions();
    }

    protected static function flushLanguage(?int $languageId): void
    {
        SiteCache::flushLanguageMeta();

        if ($languageId) {
            SiteCache::flushPanelKeywords($languageId);
            SiteCache::flushFrontendKeywords($languageId);
            SiteCache::flushHomepage($languageId);
            SiteCache::flushHeaderPages($languageId);
            SiteCache::bumpAllFrontendVersions($languageId);
        } else {
            SiteCache::flushTranslations();
            SiteCache::bumpAllFrontendVersions();
        }
    }

    protected static function flushSections(): void
    {
        SiteCache::flushSections();
        SiteCache::flushHomepage();
        SiteCache::bumpAllFrontendVersions();
    }

    protected static function languageId(Model $model): ?int
    {
        $languageId = $model->getAttribute('language_id');

        if ($languageId !== null && $languageId !== '') {
            return (int) $languageId;
        }

        if ($model->relationLoaded('category') && $model->category) {
            $categoryLanguageId = $model->category->getAttribute('language_id');

            if ($categoryLanguageId !== null && $categoryLanguageId !== '') {
                return (int) $categoryLanguageId;
            }
        }

        return null;
    }
}
