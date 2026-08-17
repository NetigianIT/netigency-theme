@php
    $name = $name ?? 'image';
    $id = $id ?? $name;
    $label = $label ?? null;
    $hint = $hint ?? null;
    $preview = $preview ?? null;
    $required = ! empty($required);
    $accept = $accept ?? 'image/svg+xml,image/jpeg,image/png,image/webp,.svg,.jpg,.jpeg,.png,.webp';
@endphp

<div class="form-group">
    @if ($label)
        <label for="{{ $id }}">
            {{ $label }}
            @if ($required)
                <span class="text-red">*</span>
            @endif
        </label>
    @endif

    <div class="ni-image-input" data-ni-image-input>
        <label class="ni-image-input__box" for="{{ $id }}">
            <span class="ni-image-input__preview">
                @if ($preview)
                    <img src="{{ $preview }}" alt="preview">
                @else
                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                @endif
            </span>
            <span class="ni-image-input__meta">
                <span class="ni-image-input__title">Click to upload or drag & drop</span>
                <span class="ni-image-input__file" data-ni-image-filename>No file chosen</span>
            </span>
        </label>
        <input
            type="file"
            name="{{ $name }}"
            id="{{ $id }}"
            class="form-control-file"
            accept="{{ $accept }}"
            @if ($required) required @endif
        >
    </div>

    @if ($hint)
        <small class="form-text text-muted">{{ $hint }}</small>
    @endif
</div>
