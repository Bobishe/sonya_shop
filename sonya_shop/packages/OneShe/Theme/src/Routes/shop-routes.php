<?php

use Illuminate\Support\Facades\Route;
use OneShe\Theme\Http\Controllers\CatalogController;

Route::get('catalog', [CatalogController::class, 'index'])
    ->name('shop.catalog.index')
    ->middleware('cache.response');
