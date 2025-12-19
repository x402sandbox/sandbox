@props(['payload'])

<div class="bg-slate-50 dark:bg-slate-800/50 border-t border-slate-200 dark:border-slate-800 p-4 font-mono text-xs overflow-x-auto">
    <div class="flex flex-col gap-y-6">
        <div>
            <h4 class="text-[10px] text-slate-400 font-bold mb-3 border-b border-slate-200 dark:border-slate-700 pb-1 uppercase">
                {{ __('Payment Payload') }}
            </h4>

            <div class="space-y-2 group/copy">
                <x-log.detail-row label="x402Version" :value="$payload->paymentPayload->x402Version" />
                <x-log.detail-row label="network" :value="$payload->paymentPayload->network" />
                <x-log.detail-row label="scheme" :value="$payload->paymentPayload->scheme" />

                @isset($payload->paymentPayload->payload->authorization)
                    <div class="mt-3 pt-3 border-t border-slate-200/50 dark:border-slate-700/50">
                        <h5 class="text-[10px] uppercase text-slate-400 mb-2">
                            {{ __('Authorization')}}
                        </h5>
                        <div class="space-y-2 pl-2 border-l-2 border-slate-200 dark:border-slate-800">
                            <x-log.detail-row
                                label="from"
                                :value="$payload->paymentPayload->payload->authorization->from"
                                copyable
                                class="truncate"
                            />
                            <x-log.detail-row
                                label="to"
                                :value="$payload->paymentPayload->payload->authorization->to"
                                copyable
                                class="truncate"
                            />
                            <x-log.detail-row
                                label="value"
                                :value="$payload->paymentPayload->payload->authorization->value"
                            />

                            <x-log.detail-row label="validAfter">
                                <div class="flex flex-col">
                                    <span class="font-mono">
                                        {{ $payload->paymentPayload->payload->authorization->validAfter ?? '-' }}
                                    </span>
                                    @isset($payload->paymentPayload->payload->authorization->validAfter)
                                        <span class="text-slate-400 text-[10px]">
                                            {{ \Carbon\Carbon::createFromTimestamp($payload->paymentPayload->payload->authorization->validAfter)->format('M d, Y H:i:s') }}
                                        </span>
                                    @endisset
                                </div>
                            </x-log.detail-row>

                            <x-log.detail-row label="validBefore">
                                <div class="flex flex-col">
                                    <span class="font-mono">
                                        {{ $payload->paymentPayload->payload->authorization->validBefore ?? '-' }}
                                    </span>
                                    @if(isset($payload->paymentPayload->payload->authorization->validBefore))
                                        <span class="text-slate-400 text-[10px]">
                                            {{ \Carbon\Carbon::createFromTimestamp($payload->paymentPayload->payload->authorization->validBefore)->format('M d, Y H:i:s') }}
                                        </span>
                                    @endif
                                </div>
                            </x-log.detail-row>

                            <x-log.detail-row
                                label="nonce"
                                :value="$payload->paymentPayload->payload->authorization->nonce"
                                copyable
                                class="truncate"
                            />
                        </div>
                    </div>
                @endisset

                <div class="mt-2 pt-2 border-t border-slate-200/50 dark:border-slate-700/50">
                    <x-log.detail-row
                        label="signature"
                        :value="$payload->paymentPayload->payload->signature"
                        copyable
                        class="truncate max-w-lg"
                    />
                </div>
            </div>
        </div>

        <div>
            <h4 class="text-[10px] text-slate-400 font-bold mb-3 border-b border-slate-200 dark:border-slate-700 pb-1 uppercase">
                {{ __('Payment Requirements') }}
            </h4>

            <div class="space-y-2 group/copy">

                <x-log.detail-row label="resource">
                    <a
                        href="{{ $payload->paymentRequirements->resource ?? '#' }}"
                        target="_blank"
                        class="text-indigo-600 dark:text-indigo-400 hover:underline break-all"
                    >
                        {{ $payload->paymentRequirements->resource }}
                    </a>
                </x-log.detail-row>

                <x-log.detail-row
                    label="payTo"
                    :value="$payload->paymentRequirements->payTo"
                    copyable
                    class="truncate"
                />
                <x-log.detail-row
                    label="amount"
                    :value="$payload->paymentRequirements->maxAmountRequired"
                />
                @isset($payload->paymentRequirements->extra)
                    <x-log.detail-row label="token">
                        {{ $payload->paymentRequirements->extra->name ?? '' }}
                        (v{{ $payload->paymentRequirements->extra->version ?? '?' }})
                    </x-log.detail-row>
                @endisset
                <x-log.detail-row
                    label="asset"
                    :value="$payload->paymentRequirements->asset"
                    copyable
                    class="truncate"
                />
                <x-log.detail-row
                    label="maxTimeout"
                    :value="$payload->paymentRequirements->maxTimeoutSeconds . 's'"
                />

            </div>
        </div>
    </div>
</div>
