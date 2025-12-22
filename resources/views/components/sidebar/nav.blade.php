@props(['title' => ''])

<nav class="mt-8 flex flex-col gap-2">
    @if($title)
    <p class="text-slate-400 dark:text-slate-200 text-[10px] uppercase tracking-wider">
        {{ $title }}
    </p>
    @endif
    <div class="text-sm text-slate-600 dark:text-slate-50 font-medium flex flex-col gap-4">
        {{ $slot }}
    </div>
</nav>
