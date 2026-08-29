@extends('layouts.admin.master')

@section('page_actions')
@endsection

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                @if (isset($fixed_content))
                    @if ($demo_mode == "on")
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('fixed-content.update', $fixed_content->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                    @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $fixed_content->title }}" required>
                                    <small class="form-text text-muted">{{ __('content.hero_title_help') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_1">{{ __('content.animated_title') }} 1</label>
                                    <input type="text" name="animated_title_1" class="form-control" id="animated_title_1" value="{{ $fixed_content->animated_title_1 }}" maxlength="120" placeholder="Web Products.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_2">{{ __('content.animated_title') }} 2</label>
                                    <input type="text" name="animated_title_2" class="form-control" id="animated_title_2" value="{{ $fixed_content->animated_title_2 }}" maxlength="120" placeholder="Mobile Apps.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_3">{{ __('content.animated_title') }} 3</label>
                                    <input type="text" name="animated_title_3" class="form-control" id="animated_title_3" value="{{ $fixed_content->animated_title_3 }}" maxlength="120" placeholder="Business Software.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_4">{{ __('content.animated_title') }} 4</label>
                                    <input type="text" name="animated_title_4" class="form-control" id="animated_title_4" value="{{ $fixed_content->animated_title_4 }}" maxlength="120" placeholder="Digital Solutions.">
                                    <small class="form-text text-muted">{{ __('content.animated_titles_help') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required>{{ $fixed_content->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="{{ $fixed_content->btn_name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{ $fixed_content->btn_link }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_status">{{ __('content.image_status') }}</label>
                                    <select class="form-control" name="image_status" id="image_status">
                                        <option value="1" {{ $fixed_content->image_status == 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ $fixed_content->image_status == 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="particles_status">{{ __('content.particles_status') }}</label>
                                    <select class="form-control" name="particles_status" id="particles_status">
                                        <option value="1" {{ ($fixed_content->particles_status ?? 1) == 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ ($fixed_content->particles_status ?? 1) == 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image">{{ __('content.thumbnail_dark') }} ({{ __('content.size') }} 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    @if(!empty($fixed_content->thumbnail_image))
                                        <img src="{{ asset('uploads/img/general/'.$fixed_content->thumbnail_image) }}" alt="dark mode hero" class="rounded ni-image-preview">
                                    @else
                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded ni-image-preview">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image_light">{{ __('content.thumbnail_light') }} ({{ __('content.size') }} 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image_light" class="form-control-file" id="thumbnail_image_light">
                                    <small class="form-text text-muted">{{ __('content.image_light_help') }}</small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    @if(!empty($fixed_content->thumbnail_image_light))
                                        <img src="{{ asset('uploads/img/general/'.$fixed_content->thumbnail_image_light) }}" alt="light mode hero" class="rounded ni-image-preview">
                                    @else
                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded ni-image-preview">
                                    @endif
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
                @else
                    @if ($demo_mode == "on")
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('fixed-content.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                    @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                    <small class="form-text text-muted">{{ __('content.hero_title_help') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_1">{{ __('content.animated_title') }} 1</label>
                                    <input type="text" name="animated_title_1" class="form-control" id="animated_title_1" maxlength="120" placeholder="Web Products.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_2">{{ __('content.animated_title') }} 2</label>
                                    <input type="text" name="animated_title_2" class="form-control" id="animated_title_2" maxlength="120" placeholder="Mobile Apps.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_3">{{ __('content.animated_title') }} 3</label>
                                    <input type="text" name="animated_title_3" class="form-control" id="animated_title_3" maxlength="120" placeholder="Business Software.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_4">{{ __('content.animated_title') }} 4</label>
                                    <input type="text" name="animated_title_4" class="form-control" id="animated_title_4" maxlength="120" placeholder="Digital Solutions.">
                                    <small class="form-text text-muted">{{ __('content.animated_titles_help') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_status">{{ __('content.image_status') }}</label>
                                    <select class="form-control" name="image_status" id="image_status">
                                        <option value="1" selected>{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="particles_status">{{ __('content.particles_status') }}</label>
                                    <select class="form-control" name="particles_status" id="particles_status">
                                        <option value="1" selected>{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image">{{ __('content.thumbnail_dark') }} ({{ __('content.size') }} 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image_light">{{ __('content.thumbnail_light') }} ({{ __('content.size') }} 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image_light" class="form-control-file" id="thumbnail_image_light">
                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
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
