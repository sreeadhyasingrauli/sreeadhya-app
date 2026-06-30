@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'bg-blue-800 text-white px-3 py-2 rounded-md text-sm font-medium'
        : 'text-indigo-200 hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
