<?php

namespace Nhattay\Laravel404page;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Nhattay\Laravel404page\Middleware\Check404Page;

class Laravel404PageProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/404page.php', '404page'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {
        $this->publishes(
            [__DIR__ . '/config/404page.php' => App::configPath('404page.php')],
            '404page'
        );
        $kernel->pushMiddleware(Check404Page::class);
    }
}