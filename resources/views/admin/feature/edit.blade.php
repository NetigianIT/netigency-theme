@extends('layouts.admin.master')

@section('page_actions')
    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
@endsection

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('feature.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <legend class="font-14">{{ __('content.type') }}</legend>
                                    <div class="form-check pl-0 mb-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input mr-2" name="type" id="optionsRadios1" onclick="showHideTypeDiv()" value="icon" {{ $feature->type == 'icon' ? 'checked' : '' }}><span class="ml-3">Icon</span>
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                    <div class="form-check pl-0">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input mr-1" name="type" id="optionsRadios2" onclick="showHideTypeDiv()" value="image" {{ $feature->type == 'image' ? 'checked' : '' }}><span class="ml-3">Image</span>
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="icon-type" class="col-md-12" style="{{ $feature->type == 'icon' ? 'display:block' : 'display:none' }}">
                                <div class="form-group">
                                    <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                    @include('admin.components.icon-picker', ['value' => $feature->icon])
                                </div>
                            </div>
                            <div id="image-type" class="col-md-12" style="{{ $feature->type == 'image' ? 'display:block' : 'display:none' }}">
                                <div class="form-group">
                                    <label for="feature_image">{{ __('content.image') }} ({{ __('content.size') }} 60 x 60) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="feature_image" class="form-control-file" id="feature_image">
                                    <small id="feature_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($feature->feature_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/features/'.$feature->feature_image) }}" alt="feature image" class="rounded">
                                                        </a>
                                                    @else
                                                        <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $feature->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="stack">{{ __('content.stack') }} <span class="text-red">*</span></label>
                                    <select name="stack" class="form-control" id="stack" required>
                                        <option value="main" {{ ($feature->stack ?? 'supporting') === 'main' ? 'selected' : '' }}>{{ __('content.main_stack') }}</option>
                                        <option value="supporting" {{ ($feature->stack ?? 'supporting') === 'supporting' ? 'selected' : '' }}>{{ __('content.supporting_stack') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }}</label>
                                    <textarea type="text" name="desc" class="form-control" id="desc">{{ $feature->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $feature->order }}" required>
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