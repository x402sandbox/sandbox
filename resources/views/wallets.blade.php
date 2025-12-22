<x-layouts.app>
    <section>
        <h2 class="font-bold dark:text-white">Magic Wallets </h2>
        <p class="text-sm text-slate-600 dark:text-slate-400">Wallets that have a deterministic outcome.</p>

        <x-card class="p-4 mt-6">
            <ul class="flex flex-col divide-y divide-slate-100 dark:divide-slate-700">
                @foreach($magicWallets as $wallet)
                <li class="py-3 first:pt-0 flex flex-col gap-3 group/copy">
                    <div>
                        <h3 class="text-sm font-medium dark:text-slate-200">{{ $wallet->name }}</h3>
                        <p class="mt-1 text-xs text-slate-600 dark:text-slate-400">{{ $wallet->description }}</p>
                    </div>

                    <div class="text-xs flex flex-col gap-1">
                        <x-log.detail-row label="Address" :value="$wallet->address" copyable />
                        <x-log.detail-row label="Key" :value="$wallet->key" copyable />
                    </div>
                </li>
                @endforeach
            </ul>
        </x-card>
    </section>
</x-layouts.app>
