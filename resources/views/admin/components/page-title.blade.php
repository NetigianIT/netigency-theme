@php
    $meta = \App\Support\AdminPageTitle::resolve();

    if (! empty($pageTitle)) {
        $meta['title'] = $pageTitle;
    }

    $pageActions = $pageActions ?? '';
    $pageTabs = $pageTabs ?? '';
@endphp

<div class="ni-page-title card box-margin">
    <div class="card-body ni-page-title__body">
        <h2 class="ni-page-title__title mb-0">{{ $meta['title'] }}</h2>
        @if (strlen(trim(strip_tags($pageActions))) > 0)
            <div class="ni-page-title__actions">
                {!! $pageActions !!}
            </div>
        @endif
        @if (strlen(trim(strip_tags($pageTabs))) > 0)
            <div class="ni-page-title__tabs">
                {!! $pageTabs !!}
            </div>
        @endif
    </div>
</div>
