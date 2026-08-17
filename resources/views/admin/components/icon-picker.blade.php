{{--
  Font Awesome free icon picker (click dropdown).

  @param string $name
  @param string|null $id
  @param string|null $value
  @param string|null $buttonId
  @param string|null $previewId
--}}
@php
    $name = $name ?? 'icon';
    $id = $id ?? $name;
    $value = $value ?? '';
    $buttonId = $buttonId ?? 'iconPickerBtn';
    $previewId = $previewId ?? 'icon-value';
    $hasValue = $value !== '';
@endphp

<div class="ni-fa-icon-picker ni-fa-icon-picker--dropdown" data-ni-fa-icon-picker>
    <input
        type="hidden"
        name="{{ $name }}"
        class="form-control"
        id="{{ $id }}"
        value="{{ $value }}"
        data-ni-fa-icon-input
    >

    <button
        type="button"
        class="ni-fa-icon-picker__preview-row"
        data-ni-fa-icon-trigger
        aria-haspopup="listbox"
        aria-expanded="false"
    >
        <span class="ni-fa-icon-picker__preview-box">
            <i
                id="{{ $previewId }}"
                class="{{ $hasValue ? $value : 'fas fa-icons' }} {{ $hasValue ? '' : 'is-empty' }}"
                data-ni-fa-icon-preview
            ></i>
        </span>
        <span
            class="ni-fa-icon-picker__preview-text"
            data-ni-fa-icon-label
            data-placeholder="{{ __('content.select_your_option') }}"
        >
            {{ $hasValue ? $value : __('content.select_your_option') }}
        </span>
        <span class="ni-fa-icon-picker__caret" aria-hidden="true">
            <i class="fas fa-chevron-down"></i>
        </span>
    </button>

    <div class="ni-fa-icon-picker__panel" data-ni-fa-icon-panel hidden>
        <div
            id="{{ $buttonId }}"
            class="icp ni-fa-icon-picker__host"
            data-placement="inline"
            @if($hasValue) data-selected="{{ $value }}" @endif
        ></div>
    </div>
</div>
