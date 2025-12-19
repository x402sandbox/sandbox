@props(['text', 'title' => 'Copy'])

<button
    type="button"
    x-data="{ copied: false }"
    @click="
        navigator.clipboard.writeText('{{ $text }}');
        copied = true;
        setTimeout(() => copied = false, 2000);
    "
    :title="copied ? 'Copied!' : '{{ $title }}'"
    :class="copied
        ? 'opacity-100 text-emerald-500'
        : 'opacity-0 group-hover/copy:opacity-100 text-slate-400 hover:text-indigo-500'"
    {{ $attributes->merge([
        'class' => 'shrink-0 transition-all duration-200 cursor-pointer'
    ])}}
>
    <div x-show="!copied">
        <x-icons.copy class="w-3.5 h-3.5" />
    </div>

    <div x-show="copied" style="display: none;" x-cloak>
        <x-icons.check class="w-3.5 h-3.5" />
    </div>
</button>
