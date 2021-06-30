<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('satker', 'SatkerCrudController');
    Route::crud('skpd', 'SkpdCrudController');
    Route::crud('permintaan', 'PermintaanCrudController');
    Route::crud('jenis_informasi', 'Jenis_informasiCrudController');
    Route::crud('link_terkait', 'Link_terkaitCrudController');
}); // this should be the absolute last line of this file