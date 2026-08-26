@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_page') }}</h4>
                <p class="text-muted mb-3">{{ __('content.page_limit_hint', ['max' => $maxPages, 'count' => $pageCount]) }}</p>
            @if (! $canCreate)
                <div class="alert alert-warning mb-0">{{ __('content.page_limit_reached', ['max' => $maxPages]) }}</div>
            @elseif ($demo_mode == "on")
                @include('admin.demo_mode.demo-mode')
            @else
                    <form action="{{ route('page.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input id="title" name="page_title" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.description') }} <span class="text-red">*</span></label>
                                    <textarea id="summernote" name="desc" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="display_header_menu">{{ __('content.display_header_menu') }} </label>
                                    <select class="form-control" name="display_header_menu" id="display_header_menu">
                                        <option value="0" selected>{{ __('content.no') }}</option>
                                        <option value="1">{{ __('content.yes') }}</option>
                                        <option value="2">{{ __('content.other') }}</option>
                                    </select>
                                    <small class="form-text text-muted">{{ __('content.if_you_choose_no') }}</small>
                                    <small class="form-text text-muted">{{ __('content.if_you_choose_other') }}</small>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="status">{{ __('content.status') }} </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="0" required>
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
            @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
