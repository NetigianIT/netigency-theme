@extends('layouts.admin.master')

@section('page_actions')
    <a href="{{ route('testimonial.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_testimonial') }}</h4>
                @if ($demo_mode == "on")
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                @endif

                        <div class="row">
                            <div class="col-12">
                                @include('admin.components.image-input', [
                                    'name' => 'testimonial_image',
                                    'id' => 'testimonial_image',
                                    'label' => __('content.image').' ('.__('content.size').' 100 x 100)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                    'preview' => !empty($testimonial->testimonial_image)
                                        ? asset('uploads/img/testimonials/'.$testimonial->testimonial_image)
                                        : null,
                                ])
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $testimonial->name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job">{{ __('content.job') }} <span class="text-red">*</span></label>
                                    <input type="text" name="job" class="form-control" id="job" value="{{ old('job', $testimonial->job) }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="4" required>{{ old('desc', $testimonial->desc) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="star" class="col-form-label">{{ __('content.star') }}</label>
                                    @include('admin.components.select', [
                                        'name' => 'star',
                                        'id' => 'star',
                                        'value' => (string) old('star', $testimonial->star),
                                        'options' => [
                                            '1' => '1',
                                            '2' => '2',
                                            '3' => '3',
                                            '4' => '4',
                                            '5' => '5',
                                        ],
                                    ])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ old('order', $testimonial->order) }}" required>
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

@endsection
