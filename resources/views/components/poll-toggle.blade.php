@props(['active' => false])

<x-button {{ $attributes->merge([
    'class' => 'flex items-center gap-2',
]) }}>
    <div class="relative flex items-center justify-center">
        @if($active)
            <span class="absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-20 animate-ping dark:opacity-15"></span>

            <x-icons.pause class="relative z-10" />
        @else
            <x-icons.play />
        @endif
    </div>

    <span>{{ $active ? 'Live' : 'Paused' }}</span>
</x-button>
