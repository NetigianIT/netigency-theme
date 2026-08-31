@extends('layouts.admin.master')

@section('page_actions')
    <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_service') }}</h4>
            @if ($demo_mode == "on")
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <input type="hidden" name="order" value="{{ $service->order }}">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $service->title }}" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.description') }}</label>
                                    <textarea name="desc" class="form-control ni-editor" id="summernote">@php echo html_entity_decode($service->desc); @endphp</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                    @include('admin.components.icon-picker', ['value' => $service->icon])
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('admin.components.image-input', [
                                    'name' => 'service_image',
                                    'id' => 'service_image',
                                    'label' => __('content.image').' ('.__('content.size').' 800 x 600)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                    'preview' => !empty($service->service_image)
                                        ? asset('uploads/img/service/'.$service->service_image)
                                        : null,
                                ])
                            </div>

                            @include('admin.components.details-repeater', ['details' => $service_details])

                            <div class="col-md-4">
                                <div class="form-group">
                                    @php $statusOn = (int) ($service->status ?? 1) === 1; @endphp
                                    <div class="ni-switch-row">
                                        <div class="ni-switch-row__text">
                                            <label class="ni-switch-row__label" for="status">{{ __('content.status') }}</label>
                                        </div>
                                        <input type="hidden" name="status" value="0">
                                        <label class="ni-switch" title="{{ $statusOn ? __('content.published') : __('content.draft') }}">
                                            <input
                                                type="checkbox"
                                                name="status"
                                                id="status"
                                                value="1"
                                                {{ $statusOn ? 'checked' : '' }}
                                            >
                                            <span class="ni-switch__track" aria-hidden="true">
                                                <span class="ni-switch__thumb"></span>
                                            </span>
                                            <span class="ni-switch__state" data-on="{{ __('content.published') }}" data-off="{{ __('content.draft') }}">
                                                {{ $statusOn ? __('content.published') : __('content.draft') }}
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 d-flex align-items-end">
                                <div class="form-group w-100">
                                    <small class="form-text text-muted mb-2">{{ __('content.required_fields') }}</small>
                                    <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                                </div>
                            </div>

                            <div class="col-md-12 height-card box-margin">
                                <div id="accordion-">
                                    <div class="card mb-2">
                                        <div class="card-header bg-secondary">
                                            <a class="collapsed text-white" data-toggle="collapse" href="#accordion-1" aria-expanded="false">
                                                {{ __('content.seo_optimization') }}
                                            </a>
                                        </div>
                                        <div id="accordion-1" class="collapse" data-parent="#accordion-">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="meta_desc">{{ __('content.meta_desc') }}</label>
                                                            <input id="meta_desc" name="meta_desc" type="text" class="form-control" value="{{ $service->meta_desc }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                                            <textarea id="meta_keyword" name="meta_keyword" class="form-control">{{ $service->meta_keyword }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script>
                        (function () {
                            var input = document.getElementById('status');
                            if (!input) return;
                            var wrap = input.closest('.ni-switch');
                            var state = wrap ? wrap.querySelector('.ni-switch__state') : null;
                            function sync() {
                                if (!state) return;
                                state.textContent = input.checked
                                    ? (state.getAttribute('data-on') || 'Published')
                                    : (state.getAttribute('data-off') || 'Draft');
                                if (wrap) {
                                    wrap.setAttribute('title', state.textContent);
                                }
                            }
                            input.addEventListener('change', sync);
                            sync();
                        })();
                    </script>
            </div>
        </div>
    </div>

@endsection
