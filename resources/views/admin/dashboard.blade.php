@extends('layouts.admin.master')

@section('content')

    @include('admin.alert.alert')

    <div class="row ni-dash-stats">

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/portfolio') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-folder-open"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.portfolios') }}</p>
                    <span class="ni-stat-card__value">{{ $portfolios_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/feature/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-star"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.features') }}</p>
                    <span class="ni-stat-card__value">{{ $features_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/work-process/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-briefcase"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.work_processes') }}</p>
                    <span class="ni-stat-card__value">{{ $work_processes_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/skill/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-code"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.skill') }}</p>
                    <span class="ni-stat-card__value">{{ $skills_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/testimonial/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-comment-dots"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.testimonials') }}</p>
                    <span class="ni-stat-card__value">{{ $testimonials_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ route('team.index') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-users"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.teams') }}</p>
                    <span class="ni-stat-card__value">{{ $teams_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/blog') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-file-alt"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.blogs') }}</p>
                    <span class="ni-stat-card__value">{{ $blogs_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/message') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-inbox"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.messages') }}</p>
                    <span class="ni-stat-card__value">{{ $messages_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/service') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-cogs"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.services') }}</p>
                    <span class="ni-stat-card__value">{{ $services_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/comment') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-comments"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.comments') }}</p>
                    <span class="ni-stat-card__value">{{ $comments_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/slider/create') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-images"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.sliders') }}</p>
                    <span class="ni-stat-card__value">{{ $sliders_count }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ url('admin/page') }}" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-file"></i></div>
                    <p class="ni-stat-card__label">{{ __('content.pages') }}</p>
                    <span class="ni-stat-card__value">{{ $pages_count }}</span>
                </div>
            </a>
        </div>

    </div>

@endsection
