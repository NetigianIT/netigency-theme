<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-primary', 'style' => 'display: inline-flex; align-items: center; padding: 0.75rem 1.5rem; background-color: #1f2937; border: 1px solid transparent; border-radius: 0.375rem; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; color: white; cursor: pointer;']) }}>
    {{ $slot }}
</button>

