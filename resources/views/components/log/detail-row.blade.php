@props(['label', 'value' => null, 'copyable' => false])

<div class="grid grid-cols-[120px_1fr] gap-2 items-start sm:items-center">
    <span class="text-slate-500">{{ $label }}</span>

    <div class="flex items-center gap-2 min-w-0">
        <span {{ $attributes->merge(['class' => 'text-slate-700 dark:text-slate-300']) }}>
            {{ $value ?? $slot }}
        </span>

        @if($copyable && $value)
            <x-log.copy-button :text="$value" title="Copy {{ $label }}" />
        @endif
    </div>
</div>
