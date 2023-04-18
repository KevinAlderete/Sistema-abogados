@props(['active'])

@php
    $classes = ($active ?? false)
    ? 'block pl-2 pr-4 py-2 text-sm font-semibold rounded-lg bg-gray-700 hover:bg-gray-600 focus:bg-gray-600 focus:text-white hover:text-white text-gray-200 focus:outline-none focus:shadow-outline'
    : 'block pl-2 pr-4 py-2 text-sm font-semibold rounded-lg bg-transparent hover:bg-gray-600 focus:bg-gray-600 focus:text-white hover:text-white text-gray-200 focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
