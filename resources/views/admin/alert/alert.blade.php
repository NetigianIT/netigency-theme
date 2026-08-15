@php
    $toastrSuccess = Session::get('success');
    $toastrWarning = Session::get('warning');
    $toastrError = Session::get('error');
    $toastrValidationErrors = ($errors ?? null) && $errors->any() ? $errors->all() : [];
@endphp

@if ($toastrSuccess || $toastrWarning || $toastrError || count($toastrValidationErrors))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof toastr === 'undefined') {
                return;
            }

            toastr.options = {
                closeButton: true,
                newestOnTop: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                preventDuplicates: true,
                showDuration: 300,
                hideDuration: 300,
                timeOut: 4200,
                extendedTimeOut: 1600,
                showEasing: 'swing',
                hideEasing: 'linear',
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut'
            };

            @if ($toastrSuccess)
                toastr.success(@json(__($toastrSuccess)));
            @endif

            @if ($toastrWarning)
                toastr.warning(@json(__($toastrWarning)));
            @endif

            @if ($toastrError)
                toastr.error(@json(__($toastrError)));
            @endif

            @if (count($toastrValidationErrors))
                @foreach ($toastrValidationErrors as $validationError)
                    toastr.error(@json(__($validationError)));
                @endforeach
            @endif
        });
    </script>
@endif
