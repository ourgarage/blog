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
        Route::get('/posts/add', 'BlogPostController@add')->name('blog::admin::posts::add');
        Route::post('/posts/store', 'BlogPostController@store')->name('blog::admin::posts::store');
        Route::get('/posts/edit/{id}', 'BlogPostController@edit')->name('blog::admin::posts::edit');
        Route::put('/posts/store/{id}', 'BlogPostController@store')->name('blog::admin::posts::update');
        Route::post('/posts/{id}', 'BlogPostController@statusUpdate')->name('blog::admin::posts::status-update');
        Route::delete('/posts/delete/{id}', 'BlogPostController@destroy')->name('blog::admin::posts::delete');
    });

    Route::group(['prefix' => 'blog', 'namespace' => 'Ourgarage\Blog\Http\Controllers'], function () {

        /**
         * Routes for frontend
         */
        Route::get('/', 'BlogController@index')->name('blog::users::index');
        Route::get('/category/{slug}', 'BlogController@category')->name('blog::users::category');
        Route::get('/posts', 'BlogController@posts')->name('blog::users::posts');
        Route::get('/post/{slug}', 'BlogController@post')->name('blog::users::post');
    });
});
