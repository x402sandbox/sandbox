<?php

namespace App\Providers;

use App\Sandbox;
use Illuminate\Support\ServiceProvider;
use X402Sandbox\Sandbox\Sandbox as SandboxContract;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SandboxContract::class, Sandbox::class);
    }

    public function boot(): void
    {
        //
    }
}
