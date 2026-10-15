<?php

namespace OneShe\Theme\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use OneShe\Theme\Console\Commands\ActivateTheme;
use Webkul\Core\Http\Middleware\PreventRequestsDuringMaintenance;
use Webkul\Theme\ViewRenderEventManager;

class OneSheThemeServiceProvider extends ServiceProvider
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
