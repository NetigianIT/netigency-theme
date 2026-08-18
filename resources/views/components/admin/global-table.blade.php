@props([
    'title' => '',
    'tableId' => 'basic-datatable',
    'hasRecords' => true,
    'emptyMessage' => null,
])

@php
    $emptyMessage = $emptyMessage ?? __('content.not_yet_created');
@endphp

<div
    class="ni-global-table"
    @if ($title) data-table-title="{{ $title }}" @endif
    data-table-id="{{ $tableId }}"
>
    @isset($add)
        <div class="ni-global-table__add-source">{!! $add !!}</div>
    @endisset

    @if ($hasRecords)
        {{ $slot }}
    @else
        <div class="ni-global-table__toolbar ni-global-table__toolbar--static">
            @if ($title)
                <h6 class="ni-global-table__title mb-0">{{ $title }}</h6>
            @endif
            <div class="ni-global-table__controls">
                @isset($add)
                    {!! $add !!}
                @endisset
            </div>
        </div>
        <p class="ni-global-table__empty mb-0">{{ $emptyMessage }}</p>
    @endif
</div>
