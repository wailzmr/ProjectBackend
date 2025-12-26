@props(['value'])

 <label {{ $attributes->merge([
    'class' => 'block mb-1 text-sm font-medium text-slate-700 dark:text-slate-300'
]) }}>

{{ $value ?? $slot }}
</label>
