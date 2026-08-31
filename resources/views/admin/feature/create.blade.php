@extends('layouts.admin.master')

@section('page_actions')
    <a href="{{ route('feature.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_feature') }}</h4>
                @if ($demo_mode == "on")
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('feature.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                @endif

                        <div class="row">
                            <div class="col-md-12">
                                @include('admin.components.image-input', [
                                    'name' => 'feature_image',
                                    'id' => 'feature_image',
                                    'label' => __('content.image').' ('.__('content.size').' 60 x 60)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="stack">{{ __('content.stack') }} <span class="text-red">*</span></label>
                                    @include('admin.components.select', [
                                        'name' => 'stack',
                                        'id' => 'stack',
                                        'value' => old('stack', 'supporting'),
                                        'required' => true,
                                        'options' => [
                                            ['value' => 'main', 'label' => __('content.main_stack'), 'icon' => 'fas fa-layer-group'],
                                            ['value' => 'supporting', 'label' => __('content.supporting_stack'), 'icon' => 'fas fa-cubes'],
                                        ],
                                    ])
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }}</label>
                                    <textarea name="desc" class="form-control" id="desc" rows="4">{{ old('desc') }}</textarea>
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
