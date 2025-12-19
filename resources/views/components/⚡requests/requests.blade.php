<main class="max-w-[1080px] mx-auto p-4">
    <section class="flex items-center justify-between gap-8">
        <a
            href="https://x402sandbox.com" class="flex items-center space-x-2 rtl:space-x-reverse"
            title="x402 Sandbox"
            target="_blank"
        >
            <x-brand-logo />
        </a>
        <div class="flex items-center gap-6">
            <x-poll-toggle
                :active="$polling"
                wire:click="togglePolling"
            />

            <x-button wire:click="clear">
                Clear
            </x-button>
        </div>
    </section>

    <section class="mt-4" @if($polling) wire:poll.2s="loadMore" @endif>
        @unless($requests->isNotEmpty())
        <div class="flex flex-col items-center justify-center p-12 text-center rounded-lg border border-dashed border-slate-300 bg-slate-50/50 dark:border-slate-700 dark:bg-slate-800/50" wire:ignore>

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 ring-8 ring-slate-50 dark:bg-slate-800 dark:ring-slate-900">
                <svg class="h-6 w-6 text-slate-500 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
              </svg>
            </div>

            <h3 class="mt-4 text-sm font-semibold text-slate-900 dark:text-white">Waiting for requests</h3>

            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400 max-w-sm mx-auto">
                To start capturing requests, replace the facilitator URL.
            </p>

            <div class="group/copy mt-6 w-full max-w-sm justify-center flex items-center gap-2">
                    <span class="text-slate-700 dark:text-slate-300">{{ $url = url('/facilitator') }}</span>
                <x-log.copy-button :text="$url" title="Copy URL" />
            </div>
        </div>
        @endunless

        @foreach($requests as $request)
        <x-log.card :type="$request->type" :ok="$request->ok" wire:key="$request->id">
            <details @if($this->isOpen($request->id)) open @endif wire:click="toggleOpen({{ $request->id }})">
                <summary class="flex flex-col sm:flex-row gap-4 sm:gap-6 sm:items-center cursor-pointer p-4 sm:p-5">
                    <x-log.timestamp :date="$request->received_at" />
                    <div class="flex-1 min-w-0">
                        <x-log.header
                            :type="$request->type"
                            :ok="$request->ok"
                            :amount="$request->payload->paymentRequirements->maxAmountRequired"
                            :token="$request->payload->paymentRequirements->extra->name"
                        />
                        <x-log.metadata
                            :payer="$request->payer"
                            :resource="$request->payload->paymentRequirements->resource"
                        />
                    </div>
                </summary>

                <x-log.payload :payload="$request->payload" />
            </details>
        </x-log.card>
        @endforeach
    </section>
</main>
