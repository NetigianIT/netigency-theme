@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.setting.partials.tabs')
@endsection

@section('content')


    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                @if (isset($fixed_content))
                    <form action="{{ route('hero-particles.update', $fixed_content->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-lg-6">
                                <div class="form-group mb-3">
                                    @include('admin.components.switch', [
                                        'name' => 'particles_status',
                                        'id' => 'particles_status',
                                        'label' => __('content.particles_status'),
                                        'help' => __('content.particles_status_help'),
                                        'value' => (string) old('particles_status', $fixed_content->particles_status ?? 1),
                                        'onLabel' => __('content.enable'),
                                        'offLabel' => __('content.disable'),
                                    ])
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="alert alert-warning mb-0" role="alert">
                        {{ __('content.hero_content_required_for_particles') }}
                        <a href="{{ route('fixed-content.create') }}" class="alert-link">{{ __('content.fixed_content') }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
