<?php

namespace Database\Seeders;

use App\Models\Admin\Feature;
use App\Models\Admin\Language;
use App\Support\SiteCache;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $mainItems = [
            ['title' => 'Laravel', 'desc' => 'Secure Laravel backends, admin panels, and business web apps built for scalability and maintainability.', 'order' => 0],
            ['title' => 'Vue.js', 'desc' => 'Fast Vue.js frontends with reusable components, smooth interactions, and clean interface architecture.', 'order' => 1],
            ['title' => 'PHP', 'desc' => 'Custom PHP development for websites, APIs, and server-side logic with stable, production-ready code.', 'order' => 2],
            ['title' => 'Node.js', 'desc' => 'Node.js APIs and real-time services for modern full-stack web products and integrations.', 'order' => 4],
            ['title' => 'MySQL', 'desc' => 'Optimized MySQL database design for secure storage, efficient queries, and scalable web applications.', 'order' => 5],
            ['title' => 'React.js', 'desc' => 'React.js dashboards and web interfaces with modular components, responsive layouts, and smooth user flows.', 'order' => 6],
            ['title' => 'Nuxt.js', 'desc' => 'Vue meta-framework for SSR, routing, and high-performance web apps.', 'order' => 7],
            ['title' => 'Vuex', 'desc' => 'Centralized state management for Vue applications and shared data.', 'order' => 8],
            ['title' => 'TypeScript', 'desc' => 'Typed JavaScript for safer, scalable frontend and full-stack applications.', 'order' => 9],
        ];

        $supporting = [
            ['title' => 'Redis', 'desc' => 'In-memory caching and queues for faster APIs and real-time performance.', 'order' => 10],
            ['title' => 'CI/CD', 'desc' => 'Automated testing and deployment pipelines for stable releases.', 'order' => 12],
            ['title' => 'Deploy', 'desc' => 'Cloud and VPS deployment with Docker and zero-downtime strategy.', 'order' => 13],
            ['title' => 'Cursor', 'desc' => 'AI-assisted development workflow for faster coding and debugging.', 'order' => 14],
            ['title' => 'PrimeVue', 'desc' => 'Vue UI component library for dashboards, forms, and rich admin interfaces.', 'order' => 15],
            ['title' => 'PrimeReact', 'desc' => 'React UI component library for production-ready dashboards and app layouts.', 'order' => 16],
            ['title' => 'Next.js', 'desc' => 'React framework for SSR, routing, and scalable production frontends.', 'order' => 18],
            ['title' => 'Zustand', 'desc' => 'Lightweight React state management with a simple, scalable store API.', 'order' => 19],
            ['title' => 'Redux', 'desc' => 'Predictable React state container for complex application data flows.', 'order' => 20],
            ['title' => 'Pinia', 'desc' => 'Modern Vue store for typed, modular, and maintainable state.', 'order' => 22],
        ];

        $mainTitles = array_column($mainItems, 'title');
        $supportingTitles = array_column($supporting, 'title');

        Feature::query()->where('title', 'Livewire')->delete();

        foreach (Language::query()->pluck('id') as $languageId) {
            foreach (array_merge($mainItems, $supporting) as $item) {
                $stack = in_array($item['title'], $mainTitles, true) ? 'main' : 'supporting';

                Feature::query()->updateOrCreate(
                    [
                        'language_id' => $languageId,
                        'title' => $item['title'],
                    ],
                    [
                        'type' => 'icon',
                        'icon' => null,
                        'desc' => $item['desc'],
                        'order' => $item['order'],
                        'stack' => $stack,
                    ]
                );
            }
        }

        Feature::query()
            ->whereIn('title', $mainTitles)
            ->update(['stack' => 'main']);

        Feature::query()
            ->whereIn('title', $supportingTitles)
            ->update(['stack' => 'supporting']);

        SiteCache::flushHomepage();
    }
}
