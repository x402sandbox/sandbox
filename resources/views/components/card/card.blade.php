<div {{ $attributes->merge([
    'class' => "group relative bg-white dark:bg-slate-900 rounded-md shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-md transition-all duration-200"
]) }}>
    {{ $slot }}
</div>
