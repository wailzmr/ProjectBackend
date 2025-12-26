@props(['disabled' => false])

<input {{ $attributes->merge([
    'class' => '
        w-full rounded-xl
        bg-white dark:bg-slate-900
        border border-slate-300 dark:border-slate-600
        text-slate-800 dark:text-slate-100
        placeholder-slate-400 dark:placeholder-slate-500
        px-4 py-2.5 text-sm
        focus:border-indigo-500 focus:ring focus:ring-indigo-200
        dark:focus:ring-indigo-500/30
        transition
    '
]) }}>
