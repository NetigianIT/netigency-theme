@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.videos.partials.tabs')
@endsection

@section('page_actions')
    <a href="{{ route('video-item.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
@endsection

@section('content')
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 box-margin">
            <div class="card card-body">
                <form action="{{ route('video-item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.category') }} <span class="text-red">*</span></label>
                                @php
                                    $categoryOptions = collect($categories)->mapWithKeys(fn ($c) => [$c->id => $c->category_name])->all();
                                @endphp
                                @include('admin.components.select', [
                                    'name' => 'category_id',
                                    'id' => 'category_id',
                                    'value' => (string) old('category_id', ''),
                                    'required' => true,
                                    'options' => $categoryOptions,
                                ])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.title') }} <span class="text-red">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.video_url') }} <span class="text-red">*</span></label>
                                <input type="url" name="video_url" class="form-control" value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=... or https://vimeo.com/..." required>
                                <small class="form-text text-muted">{{ __('content.video_url_help') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.thumbnail') }} ({{ __('content.size') }} 1280 x 720)(.svg, .png, .jpg, .jpeg, .webp)</label>
                                <input type="file" name="thumbnail_image" class="form-control-file" accept=".svg,.png,.jpg,.jpeg,.webp">
                                <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.order') }} <span class="text-red">*</span></label>
                                <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('content.description') }}</label>
                                <textarea name="desc" class="form-control" rows="3">{{ old('desc') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                @include('admin.components.switch', [
                                    'name' => 'status',
                                    'id' => 'status',
                                    'label' => __('content.status'),
                                    'value' => (string) old('status', '1'),
                                    'onLabel' => __('content.enable'),
                                    'offLabel' => __('content.disable'),
                                ])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
