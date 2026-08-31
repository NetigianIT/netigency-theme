{{--
  Toggle switch with realtime on/off label.

  @param string $name
  @param string|null $id
  @param string|null $label
  @param string|null $help
  @param mixed $value          current value
  @param mixed $onValue        value when checked (default 1)
  @param mixed $offValue       value when unchecked (default 0)
  @param string|null $onLabel
  @param string|null $offLabel
  @param bool|null $checked    force checked; else derived from $value === $onValue
  @param bool $compact         tighter style for tables
  @param bool $hideState       hide Published/Draft text (icon only)
  @param string|null $toggleUrl AJAX PATCH endpoint for list toggles
--}}
@php
    $name = $name ?? 'status';
    $id = $id ?? $name;
    $onValue = isset($onValue) ? (string) $onValue : '1';
    $offValue = isset($offValue) ? (string) $offValue : '0';
    $onLabel = $onLabel ?? __('content.enable');
    $offLabel = $offLabel ?? __('content.disable');
    $label = $label ?? null;
    $help = $help ?? null;
    $compact = !empty($compact);
    $hideState = !empty($hideState);
    $toggleUrl = $toggleUrl ?? null;
    $current = isset($value) ? (string) $value : $onValue;
    $isOn = isset($checked) ? (bool) $checked : ($current === $onValue);
@endphp

<div
    class="ni-switch-row{{ $compact ? ' ni-switch-row--compact' : '' }}{{ $hideState ? ' ni-switch-row--icon-only' : '' }}"
    data-ni-switch
    @if($toggleUrl) data-ni-status-url="{{ $toggleUrl }}" @endif
>
    @if($label || $help)
        <div class="ni-switch-row__text">
            @if($label)
                <label class="ni-switch-row__label" for="{{ $id }}">{{ $label }}</label>
            @endif
            @if($help)
                <small class="form-text text-muted mb-0">{{ $help }}</small>
            @endif
        </div>
    @endif
    @unless($toggleUrl)
        <input type="hidden" name="{{ $name }}" value="{{ $offValue }}">
    @endunless
    <label class="ni-switch" title="{{ $isOn ? $onLabel : $offLabel }}">
        <input
            type="checkbox"
            @unless($toggleUrl) name="{{ $name }}" @endunless
            id="{{ $id }}"
            value="{{ $onValue }}"
            data-ni-switch-input
            data-on-value="{{ $onValue }}"
            data-off-value="{{ $offValue }}"
            {{ $isOn ? 'checked' : '' }}
        >
        <span class="ni-switch__track" aria-hidden="true">
            <span class="ni-switch__thumb"></span>
        </span>
        @unless($hideState)
            <span
                class="ni-switch__state"
                data-ni-switch-state
                data-on="{{ $onLabel }}"
                data-off="{{ $offLabel }}"
            >{{ $isOn ? $onLabel : $offLabel }}</span>
        @else
            <span
                class="sr-only"
                data-ni-switch-state
                data-on="{{ $onLabel }}"
                data-off="{{ $offLabel }}"
            >{{ $isOn ? $onLabel : $offLabel }}</span>
        @endunless
    </label>
</div>
