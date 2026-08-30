@props([
    'title',
    'subtitle' => null,
    'align' => 'left',
    'light' => false,
    'dots' => false,
    'colClass' => 'col-lg-6',
    'rowClass' => '',
    'headingClass' => '',
    'navSlotId' => null,
])

@php
    $headingBaseClass = $align === 'center' ? 'section-heading' : 'section-heading-left';
    $headingClasses = trim($headingBaseClass.' '.($light ? 'light ' : '').$headingClass);
    $rowClasses = trim('row align-items-center '.($dots ? 'ni-heading-dots ' : '').$rowClass);
@endphp

@if (!empty($navSlotId))
<div class="{{ $rowClasses }}">
    <div class="col-12">
        <div class="ni-section-head">
            <div class="{{ $headingClasses }}">
                @if (!empty($subtitle))
                    <span>{{ $subtitle }}</span>
                @endif
                <h2>{{ $title }}</h2>
            </div>
            <div class="section-carousel-nav" id="{{ $navSlotId }}"></div>
        </div>
    </div>
</div>
@else
<div class="{{ $rowClasses }}">
    <div class="{{ $colClass }}">
        <div class="{{ $headingClasses }}">
            @if (!empty($subtitle))
                <span>{{ $subtitle }}</span>
            @endif
            <h2>{{ $title }}</h2>
        </div>
    </div>
</div>
@endif
