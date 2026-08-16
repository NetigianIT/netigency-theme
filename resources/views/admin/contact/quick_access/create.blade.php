@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                @if (isset($quick_access))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('quick-access.update', $quick_access->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    @include('admin.components.icon-select', [
                                        'name' => 'social_media',
                                        'id' => 'social_media',
                                        'value' => $quick_access->social_media,
                                        'required' => true,
                                    ])
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="link">{{ __('content.link') }}</label>
                                    <input id="link" type="text" name="link" value="{{ $quick_access->link }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $quick_access->status === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ $quick_access->status === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    @include('admin.components.icon-select', [
                                        'name' => 'contact',
                                        'id' => 'contact',
                                        'value' => $quick_access->contact,
                                        'required' => true,
                                        'icons' => [
                                            'fas fa-envelope' => 'Email',
                                            'fas fa-phone' => 'Phone',
                                        ],
                                    ])
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_or_phone">{{ __('content.email_or_phone') }}</label>
                                    <input id="email_or_phone" type="text" name="email_or_phone" value="{{ $quick_access->email_or_phone }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_phone">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status_phone" id="status_phone">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $quick_access->status_phone === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ $quick_access->status_phone === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                                @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                    @include('admin.demo_mode.demo-mode')
                                @else
                                    <form action="{{ route('quick-access.store') }}" method="POST">
                                        @csrf
                                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="social_media">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    @include('admin.components.icon-select', [
                                        'name' => 'social_media',
                                        'id' => 'social_media_create',
                                        'required' => true,
                                    ])
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="link">{{ __('content.link') }} <span class="text-red">*</span></label>
                                    <input type="text" name="link" class="form-control" id="link" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1">{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact">{{ __('content.icon') }} <span class="text-red">*</span></label>
                                    @include('admin.components.icon-select', [
                                        'name' => 'contact',
                                        'id' => 'contact_create',
                                        'required' => true,
                                        'icons' => [
                                            'fas fa-envelope' => 'Email',
                                            'fas fa-phone' => 'Phone',
                                        ],
                                    ])
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_or_phone">{{ __('content.email_or_phone') }} <span class="text-red">*</span></label>
                                    <input type="text" name="email_or_phone" class="form-control" id="email_or_phone" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_phone" class="col-form-label">{{ __('content.status') }}</label>
                                    <select name="status_phone" class="form-control" id="status_phone">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1">{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection