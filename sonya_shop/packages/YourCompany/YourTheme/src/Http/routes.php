<?php

use Illuminate\Support\Facades\Route;

/**
 * Theme routes for YourTheme
 *
 * These routes override default Bagisto shop routes
 */

Route::group([
    'middleware' => ['web', 'theme', 'locale', 'currency'],
    'prefix' => '',
], function () {

    /**
     * Home page route
     */
    Route::get('/', function () {
        return view('yourtheme::home.index');
    })->name('shop.home.index');

    /**
     * Additional theme routes can be added here
     */

    // Example: Custom catalog page
    // Route::get('/catalog', function () {
    //     return view('yourtheme::catalog.index');
    // })->name('shop.catalog.index');

    // Example: Custom product page
    // Route::get('/product/{slug}', function ($slug) {
    //     return view('yourtheme::product.view', compact('slug'));
    // })->name('shop.product.index');
});
