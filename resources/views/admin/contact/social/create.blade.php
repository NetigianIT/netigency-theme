@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.contact.partials.tabs')
@endsection

@section('page_actions')
    <a href="{{ route('social.index') }}" class="btn btn-primary">{{ __('content.back') }}</a>
@endsection

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
            @if ($demo_mode == "on")
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('social.store') }}" method="POST">
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    @include('admin.components.icon-select', [
                                        'name' => 'social_media',
                                        'id' => 'social_media',
                                        'required' => true,
                                    ])
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link">{{ __('content.link') }}</label>
                                    <input type="text" name="link" class="form-control" id="link">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">{{ __('content.status') }}</label>
                                    @include('admin.components.select', [
                                        'name' => 'status',
                                        'id' => 'status',
                                        'value' => '1',
                                        'options' => [
                                            ['value' => '1', 'label' => __('content.enable'), 'icon' => 'fas fa-check-circle'],
                                            ['value' => '0', 'label' => __('content.disable'), 'icon' => 'fas fa-times-circle'],
                                        ],
                                    ])
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
