<?php

namespace Ourgarage\Blog\Presenters;

use Carbon\Carbon;
use Ourgarage\Blog\Models\Category;
use Ourgarage\Blog\Models\Post;
use Ourgarage\Blog\Models\Tags;

class BlogPresenter
{
    /**
     * Get 5 latest post. Index page of blog
     *
     * @param Post $post
     * @return Post[]
     */
    public function getPostsIndex()
    {
        return Post::where('status', Post::STATUS_ACTIVE)
            ->where('published_at', '<=', Carbon::now())
            ->latest()->take(5)->get();
    }
    
    /**
     * Get category by slug
     *
     * @param string $slug
     * @return Category[]
     */
    public function getCategoryBySlug($slug)
    {
        return Category::where('status', Category::STATUS_ACTIVE)
            ->where('slug', $slug)->first();
    }

    /**
     * Get all posts in selected category
     *
     * @param object $category
     * @return Post[]
     */
    public function getPostsOfCategory($category)
    {
        return $category->posts()->where('status', Post::STATUS_ACTIVE)
            ->where('published_at', '<=', Carbon::now())->paginate(Post::PAGINATE);
    }
    
    /**
     * Get post by slug
     *
     * @param int $slug
     * @return object
     */
    public function getPostBySlug($slug)
    {
        return Post::where('status', Post::STATUS_ACTIVE)->where('slug', $slug)
            ->where('published_at', '<=', Carbon::now())->first();
    }
    
    /**
     * Get tag by tag
     *
     * @param string $tag
     * @return Tags[]
     */
    public function getTag($tag)
    {
        return Tags::where('tag', $tag)->first();
    }

    /**
     * Get all posts per tag
     *
     * @param object $tags
     * @return Post[]
     */
    public function getPostsByTag($tags)
    {
        return $tags->posts()->where('status', Post::STATUS_ACTIVE)
            ->where('published_at', '<=', Carbon::now())
            ->paginate(Post::PAGINATE);
    }
}
