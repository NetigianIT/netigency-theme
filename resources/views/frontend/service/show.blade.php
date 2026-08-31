@extends('layouts.frontend.master')

@section('content')
@php
    $shortDesc = $service->short_desc
        ?: ($service->meta_desc ?? null)
        ?: \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags(html_entity_decode($service->desc)))), 160);

    $infoBar = collect($details ?? [])->take(4)->values();
    if ($infoBar->isEmpty()) {
        $infoBar = collect([
            (object) ['title' => 'Service', 'desc' => $service->title],
            (object) ['title' => 'Date', 'desc' => \Carbon\Carbon::parse($service->created_at)->format('F Y')],
            (object) ['title' => 'Status', 'desc' => ((int) $service->status === 1) ? 'Published' : 'Draft'],
            (object) ['title' => 'Type', 'desc' => 'Professional'],
        ]);
    }

    $relatedServices = collect($related_services ?? []);
    $sideItems = $relatedServices->isNotEmpty()
        ? $relatedServices
        : collect($recent_posts ?? []);
    $sideIsService = $relatedServices->isNotEmpty();
@endphp

    <section class="section page-content-offset ni-detail-page ni-detail-page--service" id="service-sidebar-page">
        <div class="container">
            <div class="ni-detail-hero">
                <div class="ni-detail-hero__text">
                    <h1 class="ni-detail-hero__title">{{ $service->title }}</h1>
                    @if (!empty($shortDesc))
                        <p class="ni-detail-hero__lead">{{ $shortDesc }}</p>
                    @endif
                </div>
                <div class="ni-detail-hero__actions">
                    <a class="ni-detail-btn ni-detail-btn--primary" href="{{ url('/#services') }}">
                        <span>{{ __('frontend.services') }}</span>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
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
                        @if (!empty($service->service_image))
                            <img src="{{ asset('uploads/img/service/'.$service->service_image) }}" alt="{{ $service->title }}" class="img-fluid" fetchpriority="high" decoding="async">
                        @else
                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="{{ $service->title }}" class="img-fluid">
                        @endif
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ni-detail-media__side">
                        @if ($sideItems->count() > 0)
                            <div class="owl-carousel owl-theme ni-detail-side-carousel" id="serviceSideCarousel">
                                @foreach ($sideItems as $sideItem)
                                    <div class="item">
                                        @if ($sideIsService)
                                            <a class="ni-detail-side-card" href="{{ route('service-page.show', ['service_slug' => $sideItem->service_slug]) }}">
                                                @if (!empty($sideItem->service_image))
                                                    <img src="{{ asset('uploads/img/service/'.$sideItem->service_image) }}" alt="{{ $sideItem->title }}" class="img-fluid" loading="lazy" decoding="async">
                                                @else
                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="{{ $sideItem->title }}" class="img-fluid" loading="lazy" decoding="async">
                                                @endif
                                                <div class="ni-detail-side-card__overlay">
                                                    <span>Service</span>
                                                    <h4>{{ $sideItem->title }}</h4>
                                                </div>
                                            </a>
                                        @else
                                            <a class="ni-detail-side-card" href="{{ route('blog-page.show', ['slug' => $sideItem->slug]) }}">
                                                @if (!empty($sideItem->blog_image))
                                                    <img src="{{ asset('uploads/img/blogs/'.$sideItem->blog_image) }}" alt="{{ $sideItem->title }}" class="img-fluid" loading="lazy" decoding="async">
                                                @else
                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="{{ $sideItem->title }}" class="img-fluid" loading="lazy" decoding="async">
                                                @endif
                                                <div class="ni-detail-side-card__overlay">
                                                    <span>Recent</span>
                                                    <h4>{{ $sideItem->title }}</h4>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="ni-detail-side-panel ni-detail-side-panel--empty">
                                <div class="ni-detail-wire">
                                    <span></span><span></span><span></span>
                                </div>
                                <p>{{ $service->title }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="ni-detail-body">
                <h2 class="ni-detail-body__title">
                    <i class="fas fa-cogs" aria-hidden="true"></i>
                    <span>{{ $service->title }}</span>
                </h2>

                <div class="ni-detail-body__block">
                    <h3 class="ni-detail-body__label">Overview</h3>
                    <div class="ni-detail-body__content">
                        @php echo html_entity_decode($service->desc); @endphp
                    </div>
                </div>

                @if (count($details) > 0)
                    <div class="ni-detail-body__block">
                        <h3 class="ni-detail-body__label">{{ __('frontend.service_details') }}</h3>
                        <div class="ni-detail-service-list">
                            @foreach ($details as $detail)
                                <div class="ni-detail-service-list__item">
                                    <h4>{{ $detail->title }}</h4>
                                    <p>{{ $detail->desc }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="ni-detail-share">
                    <span class="ni-detail-share__label">{{ __('frontend.share') }}</span>
                    <a href="{{ $service->getShareUrl('twitter') }}" target="_blank" rel="noopener noreferrer" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $service->getShareUrl('whatsapp') }}" target="_blank" rel="noopener noreferrer" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="{{ $service->getShareUrl('pinterest') }}" target="_blank" rel="noopener noreferrer" aria-label="Share on Pinterest"><i class="fab fa-pinterest"></i></a>
                </div>

            </div>
        </div>
    </section>
@endsection
