@php
$class = [
    'text-xs rounded-md border px-3 py-1.5',
    'border-slate-400 dark:border-slate-400/30',
    'hover:border-slate-800 dark:hover:bg-slate-100/30',
    'text-slate-800 dark:text-slate-200 dark:hover:text-slate-100',
];
@endphp
<button {{ $attributes->merge([
    'type' => 'button',
    'class' => implode(' ', $class),
]) }}>
    {{ $slot }}
</button>
