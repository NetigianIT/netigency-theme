@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'alert alert-danger', 'style' => 'margin-bottom: 1rem; padding: 0.75rem 1rem; background-color: #fee2e2; border: 1px solid #fecaca; border-radius: 0.375rem;']) }}>
        <div style="font-weight: 500; color: #dc2626; margin-bottom: 0.5rem;">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul style="margin-top: 0.75rem; margin-bottom: 0; list-style-type: disc; list-style-position: inside; font-size: 0.875rem; line-height: 1.25rem; color: #dc2626;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

