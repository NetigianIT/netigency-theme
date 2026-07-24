@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'auth-alert auth-alert--error']) }}>
        <div class="auth-alert__title">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
