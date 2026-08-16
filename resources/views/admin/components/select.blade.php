{{--
  Nice custom select dropdown.

  @param string $name
  @param string|null $id
  @param string|null $value
  @param bool $required
  @param array $options  [ value => label ] or [ ['value'=>'', 'label'=>'', 'icon'=>''] ]
  @param string|null $placeholder
--}}
@php
    $name = $name ?? 'select';
    $id = $id ?? $name;
    $value = isset($value) ? (string) $value : '';
    $required = $required ?? false;
    $placeholder = $placeholder ?? __('content.select_your_option');
    $options = $options ?? [];
    $uid = 'ni-sel-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $id) . '-' . substr(md5($name . $id . uniqid('', true)), 0, 6);

    $normalized = [];
    foreach ($options as $key => $opt) {
        if (is_array($opt)) {
            $normalized[] = [
                'value' => (string) ($opt['value'] ?? ''),
                'label' => $opt['label'] ?? '',
                'icon' => $opt['icon'] ?? null,
            ];
        } else {
            $normalized[] = [
                'value' => (string) $key,
                'label' => $opt,
                'icon' => null,
            ];
        }
    }

    $selectedLabel = $placeholder;
    $selectedIcon = null;
    foreach ($normalized as $opt) {
        if ($value !== '' && $opt['value'] === $value) {
            $selectedLabel = $opt['label'];
            $selectedIcon = $opt['icon'];
            break;
        }
    }
@endphp

<div class="ni-select" data-ni-select id="{{ $uid }}">
    <select
        name="{{ $name }}"
        id="{{ $id }}"
        class="ni-select__native"
        data-ni-select-native
        @if($required) required @endif
        tabindex="-1"
        aria-hidden="true"
    >
        @if($value === '')
            <option value="" selected disabled>{{ $placeholder }}</option>
        @endif
        @foreach ($normalized as $opt)
            <option value="{{ $opt['value'] }}" @if($value !== '' && $opt['value'] === $value) selected @endif>
                {{ $opt['label'] }}
            </option>
        @endforeach
    </select>

    <button type="button" class="ni-select__trigger" data-ni-select-trigger aria-haspopup="listbox" aria-expanded="false">
        <span class="ni-select__value">
            @if($selectedIcon)
                <i class="{{ $selectedIcon }} ni-select__value-icon"></i>
            @endif
            <span data-ni-select-label>{{ $selectedLabel }}</span>
        </span>
        <i class="fas fa-chevron-down ni-select__caret"></i>
    </button>

    <div class="ni-select__dropdown" data-ni-select-dropdown hidden>
        <div class="ni-select__list" role="listbox" data-ni-select-list>
            @foreach ($normalized as $opt)
                <button
                    type="button"
                    class="ni-select__option @if($value !== '' && $opt['value'] === $value) is-selected @endif"
                    role="option"
                    data-ni-select-option
                    data-value="{{ $opt['value'] }}"
                    data-label="{{ $opt['label'] }}"
                    @if($opt['icon']) data-ni-icon="{{ $opt['icon'] }}" @endif
                    aria-selected="{{ ($value !== '' && $opt['value'] === $value) ? 'true' : 'false' }}"
                >
                    @if($opt['icon'])
                        <span class="ni-select__option-icon"><i class="{{ $opt['icon'] }}" aria-hidden="true"></i></span>
                    @endif
                    <span class="ni-select__option-text">{{ $opt['label'] }}</span>
                    <i class="fas fa-check ni-select__check" aria-hidden="true"></i>
                </button>
            @endforeach
        </div>
    </div>
</div>
