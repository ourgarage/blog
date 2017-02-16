<?php

namespace Ourgarage\Blog\DTO;

class BlogCategoryDTO
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var int
     */
    private $status;
    
    /**
     * @var string
     */
    private $title;
    
    /**
     * @var string
     */
    private $slug;
    
    /**
     * @var string
     */
    private $metaKeywords;
    
    /**
     * @var string
     */
    private $metaDescription;
    
    /**
     * @var string
     */
    private $meta_title;
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return BlogCategoryDTO
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * @param int $status
     * @return BlogCategoryDTO
     */
    public function setStatus($status)
    {
        $this->status = $status;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param string $title
     * @return BlogCategoryDTO
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * @param string $slug
     * @return BlogCategoryDTO
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }
    
    /**
     * @param string $metaKeywords
     * @return BlogCategoryDTO
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }
    
    /**
     * @param string $metaDescription
     * @return BlogCategoryDTO
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }
    
    /**
     * @param string $meta_title
     * @return BlogCategoryDTO
     */
    public function setMetaTitle($meta_title)
    {
        $this->meta_title = $meta_title;
        
        return $this;
    }
}
