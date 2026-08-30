@extends('layouts.frontend.master')

@section('content')

    @php
        $pageSlug = strtolower((string) ($page->page_slug ?? ''));
        $pageTitle = strtolower((string) ($page->page_title ?? ''));
        $isFaqPage = str_contains($pageSlug, 'faq')
            || str_contains($pageSlug, 'frequently-asked')
            || str_contains($pageTitle, 'faq');
        $isLegalPage = str_contains($pageSlug, 'terms')
            || str_contains($pageSlug, 'privacy')
            || str_contains($pageTitle, 'terms')
            || str_contains($pageTitle, 'privacy');
    @endphp

    <section class="section ni-page-section page-content-offset {{ $isFaqPage ? 'page-faq-section' : '' }} {{ $isLegalPage ? 'ni-page-section--legal' : '' }}" id="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <header class="ni-page-header">
                        <nav class="ni-page-hero__breadcrumb" aria-label="Breadcrumb">
                            <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            <span aria-hidden="true">/</span>
                            <span>{{ $page->page_title }}</span>
                        </nav>
                        <h1 class="ni-page-hero__title">{{ $page->page_title }}</h1>
                    </header>

                    <article class="ni-page-content services-detail-inner">
                        {!! html_entity_decode($page->desc) !!}
                    </article>
                </div>
            </div>
        </div>
    </section>

@endsection
