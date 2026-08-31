@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.blog.partials.tabs')
@endsection

@section('page_actions')
    <a href="{{ route('blog.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_blog') }}</h4>
            @if ($demo_mode == "on")
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input id="title" name="title" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">{{ __('content.categories') }} <span class="text-red">*</span></label>
                                    @php
                                        $categoryOptions = collect($categories)->mapWithKeys(fn ($c) => [$c->id => $c->category_name])->all();
                                    @endphp
                                    @include('admin.components.select', [
                                        'name' => 'category_id',
                                        'id' => 'category',
                                        'value' => (string) old('category_id', ''),
                                        'required' => true,
                                        'options' => $categoryOptions,
                                    ])
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.description') }}</label>
                                    <textarea id="summernote" name="desc" class="form-control ni-editor"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="short_desc">{{ __('content.short_desc') }}</label>
                                    <textarea id="short_desc" name="short_desc" class="form-control ni-textarea-auto" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tag">{{ __('content.tag') }} ({{ __('content.separate_with_commas') }})</label>
                                    <textarea id="tag" name="tag" class="form-control ni-textarea-auto" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type" class="col-form-label">{{ __('content.author') }}</label>
                                    @include('admin.components.select', [
                                        'name' => 'type',
                                        'id' => 'type',
                                        'value' => (string) old('type', 'with_this_account'),
                                        'options' => [
                                            'with_this_account' => __('content.with_this_account'),
                                            'anonymous' => __('content.anonymous'),
                                        ],
                                    ])
                                </div>
                            </div>

                            <div class="col-12">
                                @include('admin.components.image-input', [
                                    'name' => 'blog_image',
                                    'id' => 'blog_image',
                                    'label' => __('content.image').' ('.__('content.size').' 800 x 600)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                ])
                            </div>

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
