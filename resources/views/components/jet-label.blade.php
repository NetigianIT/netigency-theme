<label {{ $attributes->merge(['class' => 'auth-label']) }}>
    {{ $value ?? $slot }}
</label>
