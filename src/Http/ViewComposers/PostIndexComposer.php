<?php

namespace Ourgarage\Blog\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Ourgarage\Blog\Models\Category;

class PostIndexComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();

        $view->with(['categories' => $categories]);
    }
}
