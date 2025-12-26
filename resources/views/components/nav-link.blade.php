@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400
           text-sm font-medium leading-5
           text-slate-900 dark:text-indigo-400
           focus:outline-none transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent
           text-sm font-medium leading-5
           text-gray-500 dark:text-slate-300
           hover:text-gray-700 dark:hover:text-white
           hover:border-gray-300 dark:hover:border-slate-500
           focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
