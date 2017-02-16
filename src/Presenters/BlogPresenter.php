<?php

namespace Ourgarage\Blog\Presenters;

use Ourgarage\Blog\Models\Category;
use Ourgarage\Blog\Models\Post;
use Ourgarage\Blog\Models\Tags;
use Ourgarage\Blog\DTO\BlogCategoryDTO;
use Ourgarage\Blog\DTO\BlogPostDTO;

class BlogPresenter
{
    /**
     * Get all categories of blog
     *
     * @return Category[]
     */
    public function getAllCategories()
    {
        return Category::paginate(Category::PAGINATE);
    }
    
    /**
     * Get all active categories
     *
     * @return Category[]
     */
    public function getAllActiveCategories()
    {
        return Category::where('status', Category::STATUS_ACTIVE)->get();
    }
    
    /**
     * Get category by id
     *
     * @param int $id
     * @return object
     */
    public function getCategoryById($id)
    {
        return Category::find($id);
    }
    
    /**
     * Create or update category
     *
     * @param BlogCategoryDTO $dto
     * @return bool
     */
    public function createOrUpdateCategory(BlogCategoryDTO $dto)
    {
        $category = Category::findOrNew($dto->getId());
    
        $category->title = $dto->getTitle();
        $category->slug = $dto->getSlug();
        $category->meta_keywords = $dto->getMetaKeywords();
        $category->meta_description = $dto->getMetaDescription();
        $category->meta_title = $dto->getMetaTitle();
        $category->save();
        
        return true;
    }
    
    /**
     * Change status of category
     *
     * @param int $id
     * @return bool
     */
    public function changeStatusCategory($id)
    {
        $category = Category::find($id);
    
        $category->update([
            'status' => $category->status == Category::STATUS_ACTIVE ? Category::STATUS_DISABLED : Category::STATUS_ACTIVE,
        ]);
        
        return true;
    }
    
    /**
     * Delete category
     *
     * @param int $id
     * @return bool
     */
    public function destroyCategory($id)
    {
        Category::destroy($id);
        
        return true;
    }
    
    /**
     * Get all posts with paginate
     *
     * @return Post[]
     */
    public function getAllPosts()
    {
        return Post::orderBy('published_at', 'desc')->paginate(Post::PAGINATE);
    }
    
    /**
     * Get post by id
     *
     * @param int $id
     * @return object
     */
    public function getPostById($id)
    {
        return Post::find($id);
    }
    
    /**
     * Get popular tags
     *
     * @param int $take
     * @return Tags[]
     */
    public function popularTags($take)
    {
        $tags = Tags::selectRaw("blog_tags.tag, count('blog_post_tags.tag_id') as tags_count")
            ->leftJoin('blog_post_tags', 'blog_post_tags.tag_id', '=', 'blog_tags.id')
            ->groupBy('blog_tags.id')
            ->orderBy('tags_count', 'desc')
            ->take($take)->get();
    
        return $tags;
    }
    
    public function createOrUpdatePost(BlogPostDTO $dto)
    {
        $post = Post::findOrNew($id);
    
        $post->title = request('title');
        $post->category_id = request('category');
        $post->slug = request('slug');
        $post->content = request('content');
        $post->meta_keywords = request('meta_keywords');
        $post->meta_description = request('meta_description');
        $post->meta_title = request('meta_title');
        $post->published_at = Carbon::parse(request('date_published'));
    }
}
