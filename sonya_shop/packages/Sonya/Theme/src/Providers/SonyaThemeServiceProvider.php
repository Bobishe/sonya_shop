<?php

namespace Sonya\Theme\Providers;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Sonya\Theme\Console\Commands\ActivateTheme;
use Webkul\Theme\ViewRenderEventManager;

class SonyaThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the theme's routes, console commands, translations and storefront hooks.
     */
    public function boot(): void
    {
        Route::middleware(['web', 'shop', PreventRequestsDuringMaintenance::class])
            ->group(__DIR__.'/../Routes/shop-routes.php');

        if ($this->app->runningInConsole()) {
            $this->commands([ActivateTheme::class]);
        }

        $this->callAfterResolving('translator', function ($translator) {
            $translator->getLoader()->addPath(__DIR__.'/../Resources/lang');
        });

        Event::listen('bagisto.shop.layout.content.before', static function (ViewRenderEventManager $viewRenderEventManager) {
            if (themes()->current()?->code === ActivateTheme::THEME_CODE) {
                $viewRenderEventManager->addTemplate('shop::components.promo-popup.index');
            }
        });
    }
}
