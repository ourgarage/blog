<?php

namespace Ourgarage\Blog\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Ourgarage\Blog\Models\Category;

class LeftMenuComposer
{
    public function compose(View $view)
    {
        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();

        $view->with(['categories' => $categories]);
    }
}
