@props(['active'])

@php
$classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 border-b-2 border-lime-300 text-sm font-medium leading-5 text-lime-300 focus:outline-none focus:border-lime-300 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1  border-transparent text-sm font-medium leading-5 text-green-100 hover:text-lime-300 hover:border-lime-300 focus:outline-none focus:text-green-300 focus:border-lime-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
