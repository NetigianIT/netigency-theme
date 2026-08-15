@extends('layouts.admin.master')

@section('hide_page_title', true)

@section('content')

    @include('admin.alert.alert')

    <div class="row ni-dash-stats">

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/portfolio') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-folder-open"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.portfolios') }}</h6>
                    <span class="ni-stat-card__value">{{ $portfolios_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/feature/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-star"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.features') }}</h6>
                    <span class="ni-stat-card__value">{{ $features_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/work-process/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-briefcase"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.work_processes') }}</h6>
                    <span class="ni-stat-card__value">{{ $work_processes_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/skill/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-code"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.skill') }}</h6>
                    <span class="ni-stat-card__value">{{ $skills_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/testimonial/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-comment-dots"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.testimonials') }}</h6>
                    <span class="ni-stat-card__value">{{ $testimonials_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/team/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-users"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.teams') }}</h6>
                    <span class="ni-stat-card__value">{{ $teams_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/blog') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-file-alt"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.blogs') }}</h6>
                    <span class="ni-stat-card__value">{{ $blogs_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/message') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-inbox"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.messages') }}</h6>
                    <span class="ni-stat-card__value">{{ $messages_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/service') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-cogs"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.services') }}</h6>
                    <span class="ni-stat-card__value">{{ $services_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/counter/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-hourglass-start"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.counters') }}</h6>
                    <span class="ni-stat-card__value">{{ $counters_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/subscribe/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-at"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.subscribers') }}</h6>
                    <span class="ni-stat-card__value">{{ $subscribers_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/comment') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-comments"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.comments') }}</h6>
                    <span class="ni-stat-card__value">{{ $comments_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/slider/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-images"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.sliders') }}</h6>
                    <span class="ni-stat-card__value">{{ $sliders_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/page') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-file"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.pages') }}</h6>
                    <span class="ni-stat-card__value">{{ $pages_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/category/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-th-large"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.categories') }}</h6>
                    <span class="ni-stat-card__value">{{ $categories_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/social/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-share-alt"></i></div>
                    <h6 class="ni-stat-card__label">{{ __('content.socials') }}</h6>
                    <span class="ni-stat-card__value">{{ $socials_count }}</span>
                </div>
            </a>
        </div>

    </div>

@endsection
