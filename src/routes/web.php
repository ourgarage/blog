<?php

Route::group(['middleware' => 'web'], function () {

    Route::group([
        'prefix' => 'admin/blog',
        'middleware' => ['auth'],
        'namespace' => 'Ourgarage\Blog\Http\Controllers\Admin'
    ], function () {

        Route::get('/', 'BlogController@index')->name('blog::admin::index');

        /**
         * Routes blog settings
         */
        Route::get('/settings', 'BlogSettingsController@getSettings')->name('blog::admin::get-settings');
        Route::post('/settings', 'BlogSettingsController@postSettings')->name('blog::admin::post-settings');

        /**
         * Routes for categories of blog
         */
        Route::get('/categories', 'BlogCategoryController@index')->name('blog::admin::categories::index');
        Route::get('/categories/add', 'BlogCategoryController@add')->name('blog::admin::categories::add');
        Route::post('/categories/store', 'BlogCategoryController@store')->name('blog::admin::categories::store');
        Route::get('/categories/edit/{id}', 'BlogCategoryController@edit')->name('blog::admin::categories::edit');
        Route::put('/categories/store/{id}', 'BlogCategoryController@store')->name('blog::admin::categories::update');
        Route::post('/categories/{id}', 'BlogCategoryController@statusUpdate')->name('blog::admin::categories::status-update');
        Route::delete('/categories/delete/{id}', 'BlogCategoryController@destroy')->name('blog::admin::categories::delete');

        /**
         * Routes for posts of blog
         */
        Route::get('/posts', 'BlogPostController@index')->name('blog::admin::posts::index');
    });
});
