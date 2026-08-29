@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.setting.partials.tabs')
@endsection

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                @if (isset($fixed_content))
                    @php $particlesOn = (int) ($fixed_content->particles_status ?? 1) === 1; @endphp
                    <form action="{{ route('hero-particles.update', $fixed_content->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-lg-6">
                                <div class="form-group mb-3">
                                    <div class="ni-switch-row">
                                        <div class="ni-switch-row__text">
                                            <label class="ni-switch-row__label" for="particles_status">{{ __('content.particles_status') }}</label>
                                            <small class="form-text text-muted mb-0">{{ __('content.particles_status_help') }}</small>
                                        </div>
                                        <input type="hidden" name="particles_status" value="0">
                                        <label class="ni-switch" title="{{ $particlesOn ? __('content.enable') : __('content.disable') }}">
                                            <input
                                                type="checkbox"
                                                name="particles_status"
                                                id="particles_status"
                                                value="1"
                                                {{ $particlesOn ? 'checked' : '' }}
                                            >
                                            <span class="ni-switch__track" aria-hidden="true">
                                                <span class="ni-switch__thumb"></span>
                                            </span>
                                            <span class="ni-switch__state" data-on="{{ __('content.enable') }}" data-off="{{ __('content.disable') }}">
                                                {{ $particlesOn ? __('content.enable') : __('content.disable') }}
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        (function () {
                            var input = document.getElementById('particles_status');
                            if (!input) return;
                            var wrap = input.closest('.ni-switch');
                            var state = wrap ? wrap.querySelector('.ni-switch__state') : null;
                            function sync() {
                                if (!state) return;
                                state.textContent = input.checked
                                    ? (state.getAttribute('data-on') || 'Enable')
                                    : (state.getAttribute('data-off') || 'Disable');
                            }
                            input.addEventListener('change', sync);
                            sync();
                        })();
                    </script>
                @else
                    <div class="alert alert-warning mb-0" role="alert">
                        {{ __('content.hero_content_required_for_particles') }}
                        <a href="{{ route('fixed-content.create') }}" class="alert-link">{{ __('content.fixed_content') }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
