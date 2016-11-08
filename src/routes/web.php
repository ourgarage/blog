<?php

Route::group(['middleware' => 'web'], function () {

    Route::group([
        'prefix' => 'admin/blog',
        'middleware' => ['auth'],
        'namespace' => 'Ourgarage\Blog\Http\Controllers\Admin'
    ], function () {

        Route::get('/', 'BlogController@index')->name('blog::admin::index');
        Route::get('/settings', 'BlogSettingsController@index')->name('blog::admin::settings');

        /**
         * Routes for categories of blog
         */
        Route::get('/categories', 'BlogCategoryController@index')->name('blog::admin::categories::index');
        Route::get('/categories/add', 'BlogCategoryController@add')->name('blog::admin::categories::add');
        Route::post('/categories/store', 'BlogCategoryController@store')->name('blog::admin::categories::store');
        Route::put('/categories/store/{id}', 'BlogCategoryController@store')->name('blog::admin::categories::update');

        /**
         * Routes for posts of blog
         */
        Route::get('/posts', 'BlogPostController@index')->name('blog::admin::posts::index');
    });
});
