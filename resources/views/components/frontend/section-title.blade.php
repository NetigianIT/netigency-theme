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
    $titleColClass = $navSlotId ? 'col-7 col-md-6' : $colClass;
@endphp

<div class="{{ $rowClasses }}">
    <div class="{{ $titleColClass }}">
        <div class="{{ $headingClasses }}">
            @if (!empty($subtitle))
                <span>{{ $subtitle }}</span>
            @endif
            <h2>{{ $title }}</h2>
        </div>
    </div>
    @if (!empty($navSlotId))
        <div class="col-5 col-md-6">
            <div class="section-carousel-nav" id="{{ $navSlotId }}"></div>
        </div>
    @endif
</div>
