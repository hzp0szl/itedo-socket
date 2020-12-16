<?php

namespace Itedo\Socket\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;
use Itedo\Socket\Service\IteSocketService;

class SocketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton('iteSocket', function ($app) {
            return (new IteSocketService($app));
        });
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();
    }
}
