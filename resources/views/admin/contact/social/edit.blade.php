@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.contact.partials.tabs')
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
                    <form action="{{ route('social.update', $social->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    @include('admin.components.icon-select', [
                                        'name' => 'social_media',
                                        'id' => 'social_media',
                                        'value' => $social->social_media,
                                        'required' => true,
                                    ])
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link">{{ __('content.link') }}</label>
                                    <input id="link" type="text" name="link" value="{{ old('link', $social->link) }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    @include('admin.components.switch', [
                                        'name' => 'status',
                                        'id' => 'status',
                                        'label' => __('content.status'),
                                        'value' => (string) old('status', $social->status),
                                        'onLabel' => __('content.enable'),
                                        'offLabel' => __('content.disable'),
                                        'hideState' => true,
                                    ])
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <a href="{{ route('social.index') }}" class="btn btn-primary">
                                        <i class="fas fa-angle-left"></i> {{ __('content.back') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
