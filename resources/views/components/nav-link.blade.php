@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center mt-4 py-2.5 px-6 text-gray-100 border-l-3 border-golden-normal bg-white bg-opacity-5 transition-all ease-in-out'
            : 'flex items-center mt-4 py-2.5 px-6 text-gray-100 hover:border-l-3 hover:border-golden-normal hover:bg-white hover:bg-opacity-5 transition-all ease-in-out hover:translate-x-2';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
