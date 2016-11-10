<?php

namespace Ourgarage\Blog\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ourgarage\Blog\Models\Category;
use Ourgarage\Blog\Models\Post;

class BlogUserController extends Controller
{
    public function index(Post $posts, Category $categories)
    {
        $posts = $posts->where('status', Post::STATUS_ACTIVE)->latest()->take(5)->get();

        $categories = $categories->where('status', Category::STATUS_ACTIVE)->get();

        return view('blog::site.index', compact('posts', 'categories'));
    }

    public function category(Category $category, $slug)
    {
        $category = $category->where('status', Category::STATUS_ACTIVE)->where('slug', $slug)->first();

        $posts = $category->posts()->where('status', Post::STATUS_ACTIVE)->paginate(20);

        return view('blog::site.category', compact('category', 'posts'));
    }
}