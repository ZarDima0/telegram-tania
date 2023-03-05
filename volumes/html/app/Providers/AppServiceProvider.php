<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TelegramBot\Api\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Client::class, function () {
            return new Client(config('app.telegram_token'));
        });
    }
}
