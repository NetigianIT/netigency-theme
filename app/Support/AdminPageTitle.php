<?php

namespace App\Support;

class AdminPageTitle
{
    /**
     * Resolve page title meta from the current request path.
     *
     * @return array{title: string, subtitle: string, icon: string, url: string}
     */
    public static function resolve(?string $path = null): array
    {
        $path = trim($path ?? request()->path(), '/');
        $site = static::siteName();

        $items = [
            'dashboard' => [
                'title' => 'Welcome back!',
                'subtitle' => 'Manage site content for '.$site.'.',
                'icon' => 'fas fa-home',
                'url' => url('dashboard'),
            ],
            'admin/admin-role' => ['title' => __('content.admin_role_manage'), 'icon' => 'fas fa-user-lock'],
            'admin/admin-user' => ['title' => __('content.admin_manage'), 'icon' => 'fas fa-users'],
            'admin/photo' => ['title' => __('content.uploads'), 'icon' => 'fas fa-cloud-upload-alt'],
            'admin/fixed-content' => ['title' => __('content.hero_section'), 'icon' => 'fas fa-image'],
            'admin/slider' => ['title' => __('content.hero_section'), 'icon' => 'fas fa-image'],
            'admin/video' => ['title' => __('content.hero_section'), 'icon' => 'fas fa-image'],
            'admin/homepage-version' => ['title' => __('content.hero_section'), 'icon' => 'fas fa-image'],
            'admin/about' => ['title' => __('content.about'), 'icon' => 'fas fa-building'],
            'admin/info-list' => ['title' => __('content.about'), 'icon' => 'fas fa-building'],
            'admin/feature' => ['title' => __('content.features'), 'icon' => 'fas fa-gift'],
            'admin/feature-section' => ['title' => __('content.features'), 'icon' => 'fas fa-gift'],
            'admin/service-paginate' => ['title' => __('content.service_paginate'), 'icon' => 'fas fa-cogs'],
            'admin/service-detail' => ['title' => __('content.details'), 'icon' => 'fas fa-cogs'],
            'admin/service' => ['title' => __('content.services'), 'icon' => 'fas fa-cogs'],
            'admin/counter' => ['title' => __('content.counters'), 'icon' => 'fas fa-hourglass-start'],
            'admin/work-process' => ['title' => __('content.work_processes'), 'icon' => 'fas fa-project-diagram'],
            'admin/skill' => ['title' => __('content.skill'), 'icon' => 'fas fa-code'],
            'admin/skill-info-list' => ['title' => __('content.skill'), 'icon' => 'fas fa-code'],
            'admin/portfolio-category' => ['title' => __('content.categories'), 'icon' => 'fas fa-briefcase'],
            'admin/portfolio-slider' => ['title' => __('content.sliders'), 'icon' => 'fas fa-briefcase'],
            'admin/portfolio-detail' => ['title' => __('content.details'), 'icon' => 'fas fa-briefcase'],
            'admin/portfolio' => ['title' => __('content.portfolios'), 'icon' => 'fas fa-briefcase'],
            'admin/team' => ['title' => __('content.teams'), 'icon' => 'fas fa-user-friends'],
            'admin/testimonial' => ['title' => __('content.testimonials'), 'icon' => 'fas fa-quote-right'],
            'admin/category' => ['title' => __('content.categories'), 'icon' => 'fab fa-blogger-b'],
            'admin/blog-paginate' => ['title' => __('content.blog_paginate'), 'icon' => 'fab fa-blogger-b'],
            'admin/blog' => ['title' => __('content.blogs'), 'icon' => 'fab fa-blogger-b'],
            'admin/comment' => ['title' => __('content.comments'), 'icon' => 'fas fa-comments'],
            'admin/page' => ['title' => __('content.pages'), 'icon' => 'fas fa-file-alt'],
            'admin/contact' => ['title' => __('content.contact_info'), 'icon' => 'fas fa-map-marked'],
            'admin/social' => ['title' => __('content.socials'), 'icon' => 'fas fa-share-alt'],
            'admin/quick-access' => ['title' => __('content.quick_access_buttons'), 'icon' => 'fas fa-mouse-pointer'],
            'admin/message' => ['title' => __('content.messages'), 'icon' => 'fas fa-envelope'],
            'admin/site-info' => ['title' => __('content.site_info'), 'icon' => 'fas fa-cog'],
            'admin/site-image' => ['title' => __('content.site_images'), 'icon' => 'fas fa-image'],
            'admin/google-analytic' => ['title' => __('content.google_analytic'), 'icon' => 'fas fa-chart-line'],
            'admin/seo' => ['title' => __('content.seo'), 'icon' => 'fas fa-search'],
            'admin/language' => ['title' => __('content.languages'), 'icon' => 'fas fa-language'],
            'admin/language-keyword-for-adminpanel' => ['title' => __('content.for_admin_panel'), 'icon' => 'fas fa-language'],
            'admin/language-keyword-for-frontend' => ['title' => __('content.for_frontend'), 'icon' => 'fas fa-language'],
            'admin/clear-cache' => ['title' => __('content.optimizer'), 'icon' => 'fab fa-cloudscale'],
            'admin/profile/change-password' => ['title' => __('content.change_password'), 'icon' => 'fas fa-unlock-alt'],
            'admin/profile' => ['title' => __('content.profile'), 'icon' => 'fas fa-user'],
        ];

        $matched = null;
        $matchedKey = '';

        foreach ($items as $key => $meta) {
            if ($path === $key || str_starts_with($path, $key.'/')) {
                if (strlen($key) >= strlen($matchedKey)) {
                    $matchedKey = $key;
                    $matched = $meta;
                }
            }
        }

        if (! $matched) {
            $matched = [
                'title' => config('app.name', 'Admin'),
                'icon' => 'fas fa-th-large',
            ];
        }

        $title = $matched['title'];
        $subtitle = $matched['subtitle'] ?? ('Manage '.$title.' for '.$site.'.');
        $icon = $matched['icon'] ?? 'fas fa-th-large';
        $url = $matched['url'] ?? url('dashboard');

        return compact('title', 'subtitle', 'icon', 'url');
    }

    protected static function siteName(): string
    {
        $seo = view()->shared('general_seo');

        if ($seo && ! empty($seo->site_name)) {
            return $seo->site_name;
        }

        return config('app.name', 'Netigian IT');
    }
}
