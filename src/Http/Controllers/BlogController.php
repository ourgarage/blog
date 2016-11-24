<?php

namespace Ourgarage\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Ourgarage\Blog\Models\Category;
use Ourgarage\Blog\Models\Post;
use Ourgarage\Blog\Models\Tags;

class BlogController extends Controller
{
    public function index(Post $posts)
    {
        $posts = $posts->where('status', Post::STATUS_ACTIVE)
            ->where('published_at', '<=', Carbon::now())
            ->latest()->take(5)->get();

        return view('blog::site.index', compact('posts', 'categories'));
    }

    public function category(Category $category, $slug)
    {
        $category = $category->where('status', Category::STATUS_ACTIVE)
            ->where('slug', $slug)->first();

        $posts = $category->posts()->where('status', Post::STATUS_ACTIVE)
            ->where('published_at', '<=', Carbon::now())->paginate(20);

        return view('blog::site.category', compact('category', 'posts'));
    }

    public function post(Post $post, $slug)
    {
        $post = $post->where('status', Post::STATUS_ACTIVE)
            ->where('slug', $slug)->where('published_at', '<=', Carbon::now())->first();

        if(!isset($post)) {
            return abort('404');
        }

        return view('blog::site.post', compact('post'));
    }

    public function getByTag(Tags $tags, $tag)
    {
        $tags = $tags->where('tag', $tag)->first();

        if(!isset($tags)){
            return abort('404');
        }

        $posts = $tags->posts()->where('status', Post::STATUS_ACTIVE)
            ->where('published_at', '<=', Carbon::now())
            ->paginate(20);

        return view('blog::site.tag-posts', compact('tags', 'posts'));
    }
}
