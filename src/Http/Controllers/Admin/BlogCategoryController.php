<?php

namespace Ourgarage\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ourgarage\Blog\Models\Category;
use Notifications;

class BlogCategoryController extends Controller
{
    public function index()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.category.title'));

        $categories = Category::paginate(20);

        return view('blog::admin.category.index', compact('categories'));
    }

    public function add()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.category.add'));

        return view('blog::admin.category.category');
    }
}
