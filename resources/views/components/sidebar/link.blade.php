<a {{ $attributes->merge([
    'class' => 'flex items-center gap-3 hover:bg-slate-50 dark:hover:bg-slate-700 px-3 py-1.5 rounded-md data-current:bg-slate-200 dark:data-current:bg-slate-600',
    'wire:navigate' => '',
    'wire:current.exact' => ''
]) }}>
    {{ $slot }}
</a>
