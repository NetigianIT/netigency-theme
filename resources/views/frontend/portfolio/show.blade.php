@extends('layouts.frontend.master')

@section('content')
@php
    $detailMap = collect($details ?? [])->keyBy(function ($item) {
        return strtolower(trim((string) $item->title));
    });

    $pickDetail = function (array $keys) use ($detailMap) {
        foreach ($keys as $key) {
            if ($detailMap->has($key) && filled($detailMap[$key]->desc)) {
                return trim((string) $detailMap[$key]->desc);
            }
        }
        return null;
    };

    $githubUrl = $pickDetail(['github', 'github url', 'github link', 'repo', 'repository']);
    $projectUrl = $pickDetail(['project url', 'live url', 'live demo', 'demo', 'url', 'link', 'website', 'live']);
    $videoUrl = $pickDetail(['video', 'youtube', 'video url', 'youtube url']);
    $techRaw = $pickDetail(['tech stack', 'tech', 'technology', 'technologies', 'tags', 'stack']);
    $techTags = $techRaw
        ? array_values(array_filter(array_map('trim', preg_split('/[,|\/]+/', $techRaw))))
        : [];

    $skipKeys = ['github', 'github url', 'github link', 'repo', 'repository', 'project url', 'live url', 'live demo', 'demo', 'url', 'link', 'website', 'live', 'video', 'youtube', 'video url', 'youtube url', 'tech stack', 'tech', 'technology', 'technologies', 'tags', 'stack'];
    $infoBar = collect($details ?? [])
        ->reject(fn ($item) => in_array(strtolower(trim((string) $item->title)), $skipKeys, true))
        ->take(4)
        ->values();

    if ($infoBar->isEmpty()) {
        $infoBar = collect([
            (object) ['title' => 'Client', 'desc' => 'Guest'],
            (object) ['title' => 'Date', 'desc' => \Carbon\Carbon::parse($portfolio->created_at)->format('F Y')],
            (object) ['title' => 'Category', 'desc' => $portfolio->category_name],
            (object) ['title' => 'Services', 'desc' => $portfolio->category_name],
        ]);
    }

    $youtubeId = null;
    if (!empty($videoUrl) && preg_match('/(?:youtu\.be\/|v=|embed\/)([A-Za-z0-9_-]{6,})/', $videoUrl, $m)) {
        $youtubeId = $m[1];
    }

    $shortDesc = $portfolio->meta_desc
        ?: \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags(html_entity_decode($portfolio->desc)))), 160);

    $backUrl = url('/#porfolio');
@endphp

    <section class="section page-content-offset ni-detail-page ni-detail-page--portfolio" id="portfolio-single-page">
        <div class="container">
            <div class="ni-detail-hero">
                <div class="ni-detail-hero__text">
                    <h1 class="ni-detail-hero__title">{{ $portfolio->title }}</h1>
                    @if (!empty($shortDesc))
                        <p class="ni-detail-hero__lead">{{ $shortDesc }}</p>
                    @endif
                </div>
                <div class="ni-detail-hero__actions">
                    @if (!empty($githubUrl))
                        <a class="ni-detail-btn ni-detail-btn--ghost" href="{{ $githubUrl }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-github" aria-hidden="true"></i>
                            <span>GitHub</span>
                        </a>
                    @endif
                    @if (!empty($projectUrl))
                        <a class="ni-detail-btn ni-detail-btn--primary" href="{{ $projectUrl }}" target="_blank" rel="noopener noreferrer">
                            <span>View Project</span>
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    @endif
                    <a class="ni-detail-back" href="{{ $backUrl }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span>Back to Portfolio</span>
                    </a>
                </div>
            </div>

            <div class="ni-detail-meta">
                @foreach ($infoBar as $item)
                    <div class="ni-detail-meta__item">
                        <span class="ni-detail-meta__label">{{ $item->title }}</span>
                        <span class="ni-detail-meta__value">{{ $item->desc }}</span>
                    </div>
                @endforeach
            </div>

            <div class="row ni-detail-media">
                <div class="col-lg-7">
                    <div class="ni-detail-media__main">
                        @if ($youtubeId)
                            <div class="ni-detail-video">
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $youtubeId }}?rel=0"
                                    title="{{ $portfolio->title }} video"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    loading="lazy"></iframe>
                            </div>
                        @elseif (count($sliders) > 0)
                            <img src="{{ asset('uploads/img/portfolio/slider/'.$sliders->first()->portfolio_image) }}" alt="{{ $portfolio->title }}" class="img-fluid" fetchpriority="high" decoding="async">
                        @elseif (!empty($portfolio->thumbnail_image))
                            <img src="{{ asset('uploads/img/portfolio/'.$portfolio->thumbnail_image) }}" alt="{{ $portfolio->title }}" class="img-fluid" fetchpriority="high" decoding="async">
                        @else
                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="{{ $portfolio->title }}" class="img-fluid">
                        @endif
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ni-detail-media__side">
                        @if (count($sliders) > 1 || (count($sliders) === 1 && $youtubeId))
                            <div class="owl-carousel owl-theme ni-detail-side-carousel" id="portfolioSideCarousel">
                                @foreach ($sliders as $slider)
                                    @if (!$youtubeId && $loop->first)
                                        @continue
                                    @endif
                                    <div class="item">
                                        <img src="{{ asset('uploads/img/portfolio/slider/'.$slider->portfolio_image) }}" alt="{{ $portfolio->title }} gallery" class="img-fluid" loading="lazy" decoding="async">
                                    </div>
                                @endforeach
                            </div>
                        @elseif (count($sliders) === 1)
                            <div class="ni-detail-side-panel">
                                <img src="{{ asset('uploads/img/portfolio/slider/'.$sliders->first()->portfolio_image) }}" alt="{{ $portfolio->title }}" class="img-fluid" loading="lazy" decoding="async">
                            </div>
                        @else
                            <div class="ni-detail-side-panel ni-detail-side-panel--empty">
                                <div class="ni-detail-wire">
                                    <span></span><span></span><span></span>
                                </div>
                                <p>{{ $portfolio->category_name }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="ni-detail-body">
                <h2 class="ni-detail-body__title">
                    <i class="fas fa-globe" aria-hidden="true"></i>
                    <span>{{ $portfolio->title }}</span>
                </h2>

                <div class="ni-detail-body__block">
                    <h3 class="ni-detail-body__label">Overview</h3>
                    <div class="ni-detail-body__content">
                        @php echo html_entity_decode($portfolio->desc); @endphp
                    </div>
                </div>

                @if (count($techTags) > 0)
                    <div class="ni-detail-body__block">
                        <h3 class="ni-detail-body__heading">
                            <i class="fas fa-tools" aria-hidden="true"></i>
                            <span>Tech Stack</span>
                        </h3>
                        <p class="ni-detail-body__stack-text">{{ implode(', ', $techTags) }}</p>
                    </div>
                    <div class="ni-detail-tags">
                        @foreach ($techTags as $tag)
                            <span class="ni-detail-tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                @elseif (!empty($portfolio->category_name))
                    <div class="ni-detail-tags">
                        <span class="ni-detail-tag">{{ $portfolio->category_name }}</span>
                    </div>
                @endif

                <div class="ni-detail-share">
                    <span class="ni-detail-share__label">Share</span>
                    <a href="{{ $portfolio->getShareUrl('twitter') }}" target="_blank" rel="noopener noreferrer" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $portfolio->getShareUrl('whatsapp') }}" target="_blank" rel="noopener noreferrer" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="{{ $portfolio->getShareUrl('pinterest') }}" target="_blank" rel="noopener noreferrer" aria-label="Share on Pinterest"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection
