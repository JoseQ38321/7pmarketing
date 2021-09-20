@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center mb-2.5 py-1.5 px-4 text-gray-700 border-l-3 border-golden-normal bg-white bg-opacity-5 transition-all ease-in-out'
            : 'flex items-center mb-2.5 py-1.5 px-4 text-gray-700 hover:border-l-3 hover:border-golden-normal hover:bg-white hover:bg-opacity-5 transition-all ease-in-out hover:translate-x-2';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
