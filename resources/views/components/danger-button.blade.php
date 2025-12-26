<button {{ $attributes->merge([
    'class' => '
        inline-flex items-center justify-center
        px-6 py-2.5 rounded-xl font-medium
        bg-red-600 hover:bg-red-700
        dark:bg-red-700 dark:hover:bg-red-600
        text-white transition
    '
]) }}>
{{ $slot }}
</button>
