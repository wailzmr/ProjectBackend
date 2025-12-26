<button {{ $attributes->merge([
    'class' => '
        inline-flex items-center justify-center
        px-6 py-2.5 rounded-xl font-medium
        bg-slate-100 hover:bg-slate-200
        dark:bg-slate-800 dark:hover:bg-slate-700
        text-slate-800 dark:text-slate-200
        transition
    '
]) }}>
{{ $slot }}
</button>
