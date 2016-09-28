<?php

Route::group(['middleware' => 'web'], function () {

    Route::group([
        'prefix' => 'admin/blog',
        'middleware' => ['auth'],
        'namespace' => 'Ourgarage\Blog\Http\Controllers\Admin'
    ], function () {

        Route::get('/', 'BlogController@index')->name('blog::admin::index');
        Route::get('/settings', 'BlogSettingsController@index')->name('blog::admin::settings');
    });
});
