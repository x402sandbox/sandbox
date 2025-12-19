@props(['date'])

<div class="flex flex-row sm:flex-col justify-between sm:justify-start gap-2 sm:w-24 shrink-0">
    <div>
        <div class="font-mono text-sm font-bold text-slate-700 dark:text-slate-200" title="{{ $date }}">
            {{ \Carbon\Carbon::parse($date)->format('H:i:s') }}
        </div>
        <div class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mt-0.5">
            {{ \Carbon\Carbon::parse($date)->format('M d') }}
        </div>
    </div>
</div>
