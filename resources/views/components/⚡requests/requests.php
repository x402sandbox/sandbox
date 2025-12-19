<?php

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public bool $polling;

    public ?int $lastId = null;

    #[Computed]
    public Collection $requests;

    #[Computed]
    public array $open = [];

    public function mount(): void
    {
        $this->polling = Cookie::get('x402_sandbox_polling', true);
        $this->requests = Collection::empty();
        $this->loadMore();
    }

    public function togglePolling(): void
    {
        $this->polling = ! $this->polling;

        Cookie::queue('x402_sandbox_polling', $this->polling);
    }

    public function clear(): void
    {
        DB::table('sandbox_requests')->truncate();

        $this->requests = Collection::empty();
        $this->lastId = null;
    }

    public function loadMore(): void
    {
        $requests = $this->query();

        if ($requests->isNotEmpty()) {
            $this->lastId = $requests->last()?->id;
            $this->requests = $this->requests->merge($requests)->sortByDesc('id');
        }
    }

    public function isOpen(int $id): bool
    {
        return in_array($id, $this->open);
    }

    public function toggleOpen(int $id): void
    {
        $open = $this->isOpen($id);

        if ($open === true) {
            $this->open = Arr::reject(
                $this->open,
                fn (int $openId) => $openId === $id,
            );
        }

        if ($open === false) {
            $this->open[] = $id;
        }
    }

    protected function query(): Collection
    {
        return DB::table('sandbox_requests')
            ->orderBy('id')
            ->orderBy('received_at')
            ->when($this->lastId, fn (Builder $query) => $query->where('id', '>', $this->lastId))
            ->limit(10)
            ->get()
            ->map(function (object $request) {
                $request->payload = json_decode($request->payload);

                return $request;
            });
    }
};
