<?php

namespace Havenstd06\LaravelJellyfin\Providers;

/*
 * Class JellyfinServiceProvider
 * @package Havenstd06\LaravelJellyfin
 */

use Illuminate\Support\ServiceProvider;
use Havenstd06\LaravelJellyfin\Services\Jellyfin as JellyfinClient;

class JellyfinServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected bool $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('jellyfin.php'),
        ]);

        // Publish Lang Files
        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'jellyfin');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerJellyfin();

        $this->mergeConfig();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerJellyfin(): void
    {
        $this->app->singleton('jellyfin_client', static function () {
            return new JellyfinClient();
        });
    }

    /**
     * Merges user's and jellyfin configs.
     *
     * @return void
     */
    private function mergeConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/config.php',
            'jellyfin'
        );
    }
}
