@props(['type', 'amount', 'token', 'ok'])

<div class="flex items-center gap-3 mb-1.5 flex-wrap">
    <span @class([
        'font-bold text-sm uppercase tracking-wide',
        'text-emerald-600 dark:text-emerald-400' => $type === 'settle' && $ok,
        'text-indigo-600 dark:text-indigo-400' => $type === 'verify' && $ok,
        'text-rose-600 dark:text-rose-400' => !$ok,
    ])>
        {{ $type }}
    </span>

    <span class="text-slate-300 dark:text-slate-600 font-mono">→</span>

    <div @class([
        'font-mono text-sm font-bold text-slate-800 dark:text-slate-200',
        'line-through decoration-rose-600 dark:decoration-rose-400' => !$ok
        ])>
        <span>
            {{ number_format((float) $amount, 2) }}
            <span class="text-slate-500">{{ $token }}</span>
        </span>
    </div>

    @unless($ok)
    <span @class([
        'ml-auto text-[10px] font-bold uppercase px-1.5 py-0.5',
        'rounded border',
        'text-rose-600 bg-rose-200 border-rose-50 dark:border-rose-600 dark:bg-rose-800 dark:text-rose-400',
    ])>
        {{ match($type) {
            'settle' => __('Failed'),
            'verify' => __('Invalid'),
        } }}
    </span>
    @endunless
</div>
