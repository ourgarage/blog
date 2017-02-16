<?php

namespace Ourgarage\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\Blog\Presenters\BlogPresenter;

class BlogController extends Controller
{
    /**
     * Get index page of blog
     *
     * @param BlogPresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(BlogPresenter $presenter)
    {
        $posts = $presenter->getPostsIndex();

        return view('blog::site.index', compact('posts'));
    }
    
    /**
     * Get all posts in category
     *
     * @param BlogPresenter $presenter
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(BlogPresenter $presenter, $slug)
    {
        $category = $presenter->getCategoryBySlug($slug);

        $posts = $presenter->getPostsOfCategory($category);

        return view('blog::site.category', compact('category', 'posts'));
    }
    
    /**
     * Get post by slug
     *
     * @param BlogPresenter $presenter
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(BlogPresenter $presenter, $slug)
    {
        $post = $presenter->getPostBySlug($slug);

        if(!isset($post)) {
            return abort('404');
        }

        $post->increment('views');

        return view('blog::site.post', compact('post'));
    }

    public function getByTag(BlogPresenter $presenter, $tag)
    {
        $tags = $presenter->getTag($tag);

        if(!isset($tags)){
            return abort('404');
        }

        $posts = $presenter->getPostsByTag($tags);

        return view('blog::site.tag-posts', compact('tags', 'posts'));
    }
}
