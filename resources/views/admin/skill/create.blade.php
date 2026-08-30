@extends('layouts.admin.master')

@section('page_actions')
    <a href="{{ route('skill.info_list') }}" class="btn btn-primary">{{ __('content.information_list') }}</a>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.skill') }}</h4>

                @if ($demo_mode == "on")
                    @include('admin.demo_mode.demo-mode')
                @elseif (isset($skill))
                    <form action="{{ route('skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="section_title">{{ __('content.section_title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="section_title" class="form-control" id="section_title" value="{{ $skill->section_title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $skill->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }}</label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3">{{ $skill->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('admin.components.image-input', [
                                    'name' => 'skill_image',
                                    'id' => 'skill_image',
                                    'label' => __('content.thumbnail_dark').' ('.__('content.size').' 480 x 600)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                    'preview' => !empty($skill->skill_image)
                                        ? asset('uploads/img/skill/'.$skill->skill_image)
                                        : null,
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('admin.components.image-input', [
                                    'name' => 'skill_image_light',
                                    'id' => 'skill_image_light',
                                    'label' => __('content.thumbnail_light').' ('.__('content.size').' 480 x 600)',
                                    'hint' => __('content.image_light_help'),
                                    'preview' => !empty($skill->skill_image_light)
                                        ? asset('uploads/img/skill/'.$skill->skill_image_light)
                                        : null,
                                ])
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
                    <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="section_title">{{ __('content.section_title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="section_title" class="form-control" id="section_title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }}</label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('admin.components.image-input', [
                                    'name' => 'skill_image',
                                    'id' => 'skill_image',
                                    'label' => __('content.thumbnail_dark').' ('.__('content.size').' 480 x 600)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('admin.components.image-input', [
                                    'name' => 'skill_image_light',
                                    'id' => 'skill_image_light',
                                    'label' => __('content.thumbnail_light').' ('.__('content.size').' 480 x 600)',
                                    'hint' => __('content.image_light_help'),
                                ])
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
