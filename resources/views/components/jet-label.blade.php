<label {{ $attributes->merge(['class' => 'form-label', 'style' => 'display: block; font-weight: 500; font-size: 0.875rem; line-height: 1.25rem; color: #374151; margin-bottom: 0.5rem;']) }}>
    {{ $value ?? $slot }}
</label>

