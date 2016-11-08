<?php

namespace Ourgarage\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__ . '/routes/web.php';

        $this->loadViewsFrom(__DIR__.'/resources/views', 'blog');

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'blog');

        $this->publishes([
            __DIR__.'/resources/assets' => public_path('packages/blog'),
        ], 'blog');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Ourgarage\Blog\Http\Controllers\Admin\BlogController');

        $this->app->make('Ourgarage\Blog\Http\Controllers\Admin\BlogSettingsController');

        $this->app->make('Ourgarage\Blog\Http\Controllers\Admin\BlogCategoryController');

        $this->app->make('Ourgarage\Blog\Http\Controllers\Admin\BlogPostController');

        $this->mergeConfigFrom(__DIR__.'/config/blog.php', 'packages');
    }
}
