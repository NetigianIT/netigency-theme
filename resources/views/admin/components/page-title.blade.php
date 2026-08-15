@php
    $meta = \App\Support\AdminPageTitle::resolve();

    if (! empty($pageTitle)) {
        $meta['title'] = $pageTitle;
    }
@endphp

<div class="ni-page-title card box-margin">
    <div class="card-body">
        <h2 class="ni-page-title__title mb-0">{{ $meta['title'] }}</h2>
    </div>
</div>
