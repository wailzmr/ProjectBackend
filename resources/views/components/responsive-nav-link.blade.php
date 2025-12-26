@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400
           text-base font-medium
           text-indigo-700 dark:text-indigo-400
           bg-indigo-50 dark:bg-slate-800
           focus:outline-none transition'
        : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent
           text-base font-medium
           text-gray-600 dark:text-slate-300
           hover:text-gray-800 dark:hover:text-white
           hover:bg-gray-50 dark:hover:bg-slate-700
           hover:border-gray-300 dark:hover:border-slate-500
           focus:outline-none transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
