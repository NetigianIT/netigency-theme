@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.videos.partials.tabs')
@endsection

@section('content')
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 box-margin">
            <div class="card card-body">
                <form action="{{ route('video-item.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.category') }} <span class="text-red">*</span></label>
                                <select name="category_id" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ (string) old('category_id', $video->category_id) === (string) $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.title') }} <span class="text-red">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $video->title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.video_url') }} <span class="text-red">*</span></label>
                                <input type="url" name="video_url" class="form-control" value="{{ old('video_url', $video->video_url) }}" required>
                                <small class="form-text text-muted">{{ __('content.video_url_help') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.thumbnail') }} ({{ __('content.size') }} 1280 x 720)(.svg, .png, .jpg, .jpeg, .webp)</label>
                                <input type="file" name="thumbnail_image" class="form-control-file" accept=".svg,.png,.jpg,.jpeg,.webp">
                                <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                @if (!empty($video->thumbnail_image))
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/img/videos/'.$video->thumbnail_image) }}" alt="{{ $video->title }}" style="max-width: 220px; border-radius: 8px;">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.order') }} <span class="text-red">*</span></label>
                                <input type="number" name="order" class="form-control" value="{{ old('order', $video->order) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('content.description') }}</label>
                                <textarea name="desc" class="form-control" rows="3">{{ old('desc', $video->desc) }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('content.status') }}</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ (string) old('status', $video->status) === '1' ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                    <option value="0" {{ (string) old('status', $video->status) === '0' ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                </select>
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
