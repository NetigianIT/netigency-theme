@extends('layouts.admin.master')

@section('content')

    @include('admin.alert.alert')

    <div class="ni-dash-welcome card box-margin">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
            <div class="ni-dash-welcome__text">
                <h2 class="ni-dash-welcome__title mb-1">Welcome back!</h2>
                <p class="ni-dash-welcome__subtitle mb-0">
                    Manage site content for {{ $site_name }}.
                </p>
            </div>
            <a href="{{ url('dashboard') }}" class="ni-dash-welcome__icon" aria-label="Dashboard">
                <i class="fas fa-home"></i>
            </a>
        </div>
    </div>

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

    </div>

@endsection
