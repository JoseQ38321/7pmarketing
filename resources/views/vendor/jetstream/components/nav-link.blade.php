@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-semibold underline transition'
            : 'font-semibold hover:text-gray-900 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
