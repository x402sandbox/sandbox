@props(['payer', 'resource'])

<div class="flex items-center gap-2 text-xs font-mono text-slate-500 dark:text-slate-400 overflow-hidden">
    <div class="flex items-center gap-1.5 shrink-0">
        <span title="{{ $payer }}">
            {{ Str::limit($payer, 10, '...' . Str::take($payer, -4)) }}
        </span>
    </div>

    <span class="text-slate-300 dark:text-slate-600">•</span>

    <div target="_blank" class="truncate">
        {{ Str::replace(['https://', 'http://'], '', $resource) }}
    </div>
</div>
