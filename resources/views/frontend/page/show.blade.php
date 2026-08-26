@extends('layouts.frontend.master')

@section('content')

    @php
        $pageSlug = strtolower((string) ($page->page_slug ?? ''));
        $pageTitle = strtolower((string) ($page->page_title ?? ''));
        $isFaqPage = str_contains($pageSlug, 'faq')
            || str_contains($pageSlug, 'frequently-asked')
            || str_contains($pageTitle, 'faq');
    @endphp

    @unless ($isFaqPage)
        <!--// Breadcrumb Section Start //-->
        <section class="breadcrumb-section section" data-scroll-index="1" @if (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
                 @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x350.jpg') }}"
                 @endif>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb-inner">
                            <h1>{{ $page->page_title }}</h1>
                            <ul class="breadcrumb-links">
                                <li>
                                    <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                                </li>
                                <li class="active">
                                    {{ $page->page_title }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Breadcrumb Section end //-->
    @endunless

    <!--// Page Content Start //-->
    <section class="section {{ $isFaqPage ? 'page-faq-section' : '' }}">
        <div class="container">
            <div class="row">
                <div class="{{ $isFaqPage ? 'col-lg-10 col-md-12 mx-auto' : 'col-lg-8 col-md-12' }}">
                    @if ($isFaqPage)
                        <div class="section-heading page-faq-heading">
                            <h1>{{ $page->page_title }}</h1>
                        </div>
                    @endif
                    <div class="services-detail-inner">
                        <p>@php echo html_entity_decode($page->desc); @endphp</p>
                    </div>
                </div>
                @unless ($isFaqPage)
                    <div class="col-lg-4 col-md-12">
                        <div class="widget-sidebar">
                            <div class="sidebar-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.share') }}</h5>
                                <ul class="sidebar-share clearfix">
                                    <li>
                                        <a href="{{$page->getShareUrl('twitter')}}" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$page->getShareUrl('whatsapp')}}" target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$page->getShareUrl('pinterest')}}" target="_blank">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endunless
            </div>
        </div>
    </section>
    <!--// Page Content End //-->

@endsection
