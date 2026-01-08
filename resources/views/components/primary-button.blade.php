<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => '
        inline-flex items-center justify-center
        px-6 py-2.5 rounded-xl font-semibold
        bg-indigo-600 hover:bg-indigo-700
        dark:bg-indigo-500 dark:hover:bg-indigo-400
        text-white
        shadow-sm hover:shadow
        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
        dark:focus:ring-indigo-400 dark:focus:ring-offset-slate-900
        disabled:opacity-60 disabled:cursor-not-allowed
        transition
    '
]) }}>
    {{ $slot }}
</button>
