<?php

namespace Ourgarage\Blog\Presenters;

use Ourgarage\Blog\Models\Category;
use Ourgarage\Blog\Models\Post;
use Ourgarage\Blog\DTO\BlogCategoryDTO;

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
}
