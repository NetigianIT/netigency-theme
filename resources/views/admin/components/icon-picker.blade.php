{{--
  Font Awesome free icon picker (feature / service / contact).

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
@endphp

<div class="ni-fa-icon-picker btn-group">
    <input type="hidden" name="{{ $name }}" class="form-control" id="{{ $id }}" value="{{ $value }}">
    <button type="button" class="btn btn-primary iconpicker-component ni-fa-icon-picker__preview">
        <i id="{{ $previewId }}" class="{{ $value }} iconpicker-component"></i>
    </button>
    <button
        type="button"
        id="{{ $buttonId }}"
        class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component"
        data-selected="fa-car"
        data-toggle="dropdown"
    >
        <span class="caret"></span>
    </button>
    <div class="dropdown-menu"></div>
</div>
