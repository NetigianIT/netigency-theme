<button type="{{ $type }}" {{ $attributes->merge(['class' => 'auth-submit']) }}>
    {{ $slot }}
</button>
