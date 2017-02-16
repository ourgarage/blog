<?php

namespace Ourgarage\Blog\Presenters\Admin;

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
        return Post::with('category')->orderBy('published_at', 'desc')->paginate(Post::PAGINATE);
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
    
    /**
     * Create or update post. Add tags
     *
     * @param BlogPostDTO $dto
     * @return bool
     */
    public function createOrUpdatePost(BlogPostDTO $dto)
    {
        $post = Post::findOrNew($dto->getId());
        
        $post->title = $dto->getTitle();
        $post->category_id = $dto->getCategoryId();
        $post->slug = $dto->getSlug();
        $post->content = $dto->getContent();
        $post->meta_keywords = $dto->getMetaKeywords();
        $post->meta_description = $dto->getMetaDescription();
        $post->meta_title = $dto->getMetaTitle();
        $post->published_at = $dto->getPublishedAt();
        $post->save();
    
        $this->_setTags($dto->getTags(), $post->id);
        
        return true;
    }
    
    /**
     * Change status of post
     *
     * @param int $id
     * @return bool
     */
    public function changeStatusPost($id)
    {
        $post = Post::find($id);
    
        $post->update([
            'status' => $post->status == Post::STATUS_ACTIVE ? Post::STATUS_DISABLED : Post::STATUS_ACTIVE,
        ]);
        
        return true;
    }
    
    /**
     * Get all posts in selected category
     *
     * @param int $idCategory
     * @return Post[]
     */
    public function getPostsOfCategory($idCategory)
    {
        return Post::with('category')->where('category_id', $idCategory)
            ->orderBy('published_at', 'desc')->paginate(Post::PAGINATE);
    }
    
    /**
     * Delete post from DB and detached tags
     *
     * @param int $id
     * @return bool
     */
    public function destroyPost($id)
    {
        $post = Post::find($id);
        
        $post->tags()->detach();
        $post->delete();
        
        return true;
    }
    
    /**
     * Add tags in DB. Attach/detach tags to post
     *
     * @param array $tags_str
     * @param int $post_id
     */
    private function _setTags($tags_str, $post_id)
    {
        $post = Post::find($post_id);
        $post->tags()->detach();
        
        $tags = explode(',', $tags_str);
        
        foreach ($tags as $tag) {
            
            $tag = mb_strtolower(trim($tag));
            $dbtag = Tags::where('tag', 'like', $tag)->first();
            if (empty($dbtag)) {
                $post->tags()->create([
                    'tag' => $tag
                ]);
            } else {
                $post->tags()->attach($dbtag);
            }
        }
    }
}
