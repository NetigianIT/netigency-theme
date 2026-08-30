@extends('layouts.admin.master')

@section('content')

    @include('admin.alert.alert')

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
                        <input type="hidden" name="order" value="0">
                        <div class="row align-items-end ni-page-meta-row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-3 mb-lg-2">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input id="title" name="page_title" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group mb-3 mb-lg-2">
                                    <label for="display_header_menu">{{ __('content.display_header_menu') }}</label>
                                    <select class="form-control" name="display_header_menu" id="display_header_menu">
                                        <option value="0" selected>{{ __('content.no') }}</option>
                                        <option value="1">{{ __('content.yes') }}</option>
                                        <option value="2">{{ __('content.other') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group mb-3 mb-lg-2">
                                    <label for="status">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <small class="form-text text-muted mt-0 mb-3">{{ __('content.if_you_choose_no') }} {{ __('content.if_you_choose_other') }}</small>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.details') }} <span class="text-red">*</span></label>
                                    <textarea id="summernote" name="desc" class="form-control ni-editor"></textarea>
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

@endsection
