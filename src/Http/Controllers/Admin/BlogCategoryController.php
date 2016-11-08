<?php

namespace Ourgarage\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function index()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('blog::blog.category.title'));

        return view('blog::admin.category.index');
    }
}
