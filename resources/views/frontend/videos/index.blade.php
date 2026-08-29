@extends('layouts.frontend.master')

@section('content')
@php
    $activeCategorySlug = isset($category) ? $category->category_slug : null;
@endphp

    <section class="section pb-minus-76 page-content-offset" id="videos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-4">
                    <h1 class="ni-videos-title">{{ __('frontend.videos') }}</h1>
                    @if (isset($category))
                        <p class="ni-videos-subtitle">{{ $category->category_name }}</p>
                    @endif
                </div>
            </div>

            @if (count($categories) > 0)
                <div class="ni-videos-filter portfolio-filter mb-4">
                    <a href="{{ route('video-page.index') }}" class="{{ $activeCategorySlug === null ? 'current' : '' }}">{{ __('frontend.all') }}</a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('video-page.category', ['category_slug' => $cat->category_slug]) }}"
                           class="{{ $activeCategorySlug === $cat->category_slug ? 'current' : '' }}">
                            {{ $cat->category_name }}
                        </a>
                    @endforeach
                </div>
            @endif

            @if (count($videos) > 0)
                @foreach ($grouped as $categoryId => $categoryVideos)
                    @php
                        $groupCategory = $categories->firstWhere('id', $categoryId)
                            ?? ($categoryVideos->first()?->category ?? null);
                    @endphp
                    <div class="ni-videos-group mb-5">
                        @if ($activeCategorySlug === null && $groupCategory)
                            <h3 class="ni-videos-group__title">{{ $groupCategory->category_name ?? ($categoryVideos->first()->category_name ?? '') }}</h3>
                        @endif
                        <div class="row">
                            @foreach ($categoryVideos as $video)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <article class="ni-video-card">
                                        <div class="ni-video-card__media">
                                            @if ($video->embedUrl())
                                                <iframe
                                                    src="{{ $video->embedUrl() }}"
                                                    title="{{ $video->title }}"
                                                    loading="lazy"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen
                                                ></iframe>
                                            @elseif ($video->thumbnailUrl())
                                                <a href="{{ $video->video_url }}" target="_blank" rel="noopener noreferrer">
                                                    <img src="{{ $video->thumbnailUrl() }}" alt="{{ $video->title }}" class="img-fluid" loading="lazy">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="ni-video-card__body">
                                            <h5 class="ni-video-card__title">{{ $video->title }}</h5>
                                            @if (!empty($video->desc))
                                                <p class="ni-video-card__desc">{{ $video->desc }}</p>
                                            @endif
                                            <span class="ni-video-card__provider">{{ ucfirst($video->provider) }}</span>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-12">
                        <p>{{ __('frontend.updating') }}</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
