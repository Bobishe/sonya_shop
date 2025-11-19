<?php

namespace YourCompany\YourTheme\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class YourThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Register views with namespace 'yourtheme'
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'yourtheme');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        // Publish views to resources/themes/yourtheme/views
        $this->publishes([
            __DIR__ . '/../Resources/views' => resource_path('themes/yourtheme/views'),
        ], 'yourtheme-views');

        // Publish assets to public/themes/yourtheme/assets
        $this->publishes([
            __DIR__ . '/../Resources/assets' => public_path('themes/yourtheme/assets'),
        ], 'yourtheme-assets');

        // Publish config
        $this->publishes([
            __DIR__ . '/../../config/themes.php' => config_path('themes.php'),
        ], 'yourtheme-config');

        // Auto-publish assets if they don't exist
        if (!File::exists(public_path('themes/yourtheme'))) {
            $this->publishes([
                __DIR__ . '/../Resources/assets' => public_path('themes/yourtheme/assets'),
            ], 'yourtheme-assets');
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Merge theme configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/themes.php',
            'themes'
        );

        // Register theme view namespace as priority
        $this->app->booted(function () {
            if (config('themes.default') === 'yourtheme') {
                view()->replaceNamespace('shop', [
                    resource_path('themes/yourtheme/views'),
                    __DIR__ . '/../Resources/views',
                ]);
            }
        });
    }
}
