@extends('layouts.admin.master')

@section('page_actions')
    <a href="{{ route('service.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_service') }}</h4>
            @if ($demo_mode == "on")
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @endif

                        <input type="hidden" name="order" value="0">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input id="title" name="title" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.description') }}</label>
                                    <textarea id="summernote" name="desc" class="form-control ni-editor"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                @include('admin.components.image-input', [
                                    'name' => 'service_image',
                                    'id' => 'service_image',
                                    'label' => __('content.image').' ('.__('content.size').' 800 x 600)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                ])
                            </div>

                            @include('admin.components.details-repeater')

                            <div class="col-12">
                                <h5 class="mb-3 mt-2">{{ __('content.seo_optimization') }}</h5>
                                <div class="form-group">
                                    <label for="meta_desc">{{ __('content.meta_desc') }}</label>
                                    <input id="meta_desc" name="meta_desc" type="text" class="form-control" value="{{ old('meta_desc') }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                    <textarea id="meta_keyword" name="meta_keyword" class="form-control">{{ old('meta_keyword') }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
