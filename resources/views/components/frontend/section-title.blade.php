@props([
    'title',
    'subtitle' => null,
    'align' => 'left',
    'light' => false,
    'dots' => false,
    'colClass' => 'col-lg-6',
    'rowClass' => '',
    'headingClass' => '',
])

@php
    $headingBaseClass = $align === 'center' ? 'section-heading' : 'section-heading-left';
    $headingClasses = trim($headingBaseClass.' '.($light ? 'light ' : '').$headingClass);
    $rowClasses = trim('row '.($dots ? 'ni-heading-dots ' : '').$rowClass);
@endphp

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
