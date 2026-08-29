{{-- Shared service / portfolio details repeater (create + edit) --}}
@php
    $details = collect($details ?? []);
@endphp

<div class="col-12" id="ni-details-section">
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('content.details') }}</h5>
            <button type="button" class="btn btn-sm btn-primary" id="ni-add-detail-row">
                + {{ __('content.add_detail') }}
            </button>
        </div>
        <div class="card-body">
            <div id="ni-details-list">
                @forelse ($details as $index => $detail)
                    <div class="ni-detail-row border rounded p-3 mb-3">
                        <input type="hidden" name="details[{{ $index }}][id]" value="{{ $detail->id }}">
                        <div class="row align-items-end ni-detail-row__fields">
                            <div class="col-md">
                                <div class="form-group mb-md-0">
                                    <label>{{ __('content.title') }}</label>
                                    <input type="text" name="details[{{ $index }}][title]" class="form-control" value="{{ $detail->title }}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group mb-md-0">
                                    <label>{{ __('content.description') }}</label>
                                    <input type="text" name="details[{{ $index }}][desc]" class="form-control" value="{{ $detail->desc }}">
                                </div>
                            </div>
                            <div class="col-md-auto ni-detail-row__order">
                                <div class="form-group mb-md-0">
                                    <label>{{ __('content.order') }}</label>
                                    <input type="number" name="details[{{ $index }}][order]" class="form-control" value="{{ $detail->order }}">
                                </div>
                            </div>
                            <div class="col-md-auto d-flex align-items-end pb-1">
                                <button type="button" class="btn btn-link text-danger ni-remove-detail-row p-0" title="{{ __('content.delete') }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <small class="form-text text-muted">{{ __('content.add_detail') }} — {{ __('content.title') }}, {{ __('content.description') }}, {{ __('content.order') }}</small>
        </div>
    </div>
</div>

<template id="ni-detail-row-template">
    <div class="ni-detail-row border rounded p-3 mb-3">
        <div class="row align-items-end ni-detail-row__fields">
            <div class="col-md">
                <div class="form-group mb-md-0">
                    <label>{{ __('content.title') }}</label>
                    <input type="text" name="details[__INDEX__][title]" class="form-control" value="">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group mb-md-0">
                    <label>{{ __('content.description') }}</label>
                    <input type="text" name="details[__INDEX__][desc]" class="form-control" value="">
                </div>
            </div>
            <div class="col-md-auto ni-detail-row__order">
                <div class="form-group mb-md-0">
                    <label>{{ __('content.order') }}</label>
                    <input type="number" name="details[__INDEX__][order]" class="form-control" value="0">
                </div>
            </div>
            <div class="col-md-auto d-flex align-items-end pb-1">
                <button type="button" class="btn btn-link text-danger ni-remove-detail-row p-0" title="{{ __('content.delete') }}">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
(function () {
    var list = document.getElementById('ni-details-list');
    var template = document.getElementById('ni-detail-row-template');
    var addBtn = document.getElementById('ni-add-detail-row');
    if (!list || !template || !addBtn) return;

    var nextIndex = list.querySelectorAll('.ni-detail-row').length;

    function addRow() {
        var html = template.innerHTML.replace(/__INDEX__/g, String(nextIndex++));
        list.insertAdjacentHTML('beforeend', html);
    }

    addBtn.addEventListener('click', function (e) {
        e.preventDefault();
        addRow();
    });

    list.addEventListener('click', function (e) {
        var btn = e.target.closest('.ni-remove-detail-row');
        if (!btn) return;
        e.preventDefault();
        var row = btn.closest('.ni-detail-row');
        if (row) row.remove();
    });

    if (nextIndex === 0) {
        addRow();
    }
})();
</script>
