@props(['type', 'ok'])

@php
    $borderColor = match($type) {
        'settle' => 'border-l-emerald-600 dark:border-l-emerald-400',
        'verify' => 'border-l-indigo-600 dark:border-l-indigo-400',
        default => 'border-l-slate-600 dark:border-l-slate-400',
    };

    if (!$ok) {
        $borderColor = 'border-l-rose-600 dark:border-l-rose-400';
    }
@endphp

<div {{ $attributes->merge([
    'class' => "group relative bg-white dark:bg-slate-900 rounded-r-lg rounded-l-[4px] shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-md transition-all duration-200 mb-4 border-l-[6px] $borderColor"]
) }}>
    {{ $slot }}
</div>
