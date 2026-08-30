@extends('layouts.frontend.master')

@section('content')
@php
    $activeCategorySlug = isset($category) ? $category->category_slug : null;
@endphp

    <section class="section pb-minus-76 page-content-offset" id="videos">
        <div class="container">
            <div class="ni-videos-header text-center">
                <h1 class="ni-videos-title">{{ __('frontend.video_presentations') }}</h1>
            </div>

            @if (count($categories) > 0)
                <div class="ni-videos-filter portfolio-filter" data-video-filter-tabs>
                    <a href="{{ route('video-page.index') }}"
                       data-video-filter="*"
                       class="{{ $activeCategorySlug === null ? 'current' : '' }}">{{ __('frontend.all') }}</a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('video-page.category', ['category_slug' => $cat->category_slug]) }}"
                           data-video-filter=".{{ $cat->category_slug }}"
                           class="{{ $activeCategorySlug === $cat->category_slug ? 'current' : '' }}">
                            {{ $cat->category_name }}
                        </a>
                    @endforeach
                </div>
            @endif

            @if (count($videos) > 0)
                <div class="row ni-videos-grid" data-video-grid>
                    @foreach ($videos as $video)
                        @php
                            $videoCategorySlug = optional($video->category)->category_slug
                                ?? optional($categories->firstWhere('id', $video->category_id))->category_slug
                                ?? 'uncategorized';
                        @endphp
                        <div class="col-md-6 col-lg-4 ni-video-item {{ $videoCategorySlug }}" data-video-category="{{ $videoCategorySlug }}">
                            <article class="ni-video-card">
                                <div class="ni-video-card__media"
                                     @if ($video->embedUrl())
                                         data-video-embed
                                         data-embed-src="{{ $video->embedUrl(true) }}"
                                     @endif>
                                    @if ($video->thumbnailUrl())
                                        <button type="button" class="ni-video-card__play" aria-label="Play {{ $video->title }}">
                                            <img src="{{ $video->thumbnailUrl() }}" alt="{{ $video->title }}" class="ni-video-card__thumb" loading="lazy">
                                            <span class="ni-video-card__play-icon" aria-hidden="true">
                                                <i class="fas fa-play"></i>
                                            </span>
                                        </button>
                                    @elseif ($video->embedUrl())
                                        <iframe
                                            src="{{ $video->embedUrl() }}"
                                            title="{{ $video->title }}"
                                            loading="lazy"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen
                                        ></iframe>
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
                <div class="ni-videos-empty" data-video-empty hidden>
                    <p class="ni-videos-empty__text">{{ __('frontend.updating') }}</p>
                </div>
            @else
                <div class="ni-videos-empty">
                    <p class="ni-videos-empty__text">{{ __('frontend.updating') }}</p>
                </div>
            @endif
        </div>
    </section>
@endsection
