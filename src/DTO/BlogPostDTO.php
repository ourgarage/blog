<?php

namespace Ourgarage\Blog\DTO;

class BlogPostDTO
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var int
     */
    private $categoryId;
    
    /**
     * @var int
     */
    private $views;
    
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
    private $content;
    
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
    private $metaTitle;
    
    /**
     * @var string
     */
    private $publishedAt;
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return BlogPostDTO
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
    
    /**
     * @param int $categoryId
     * @return BlogPostDTO
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }
    
    /**
     * @param int $views
     * @return BlogPostDTO
     */
    public function setViews($views)
    {
        $this->views = $views;
        
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
     * @return BlogPostDTO
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
     * @return BlogPostDTO
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
     * @return BlogPostDTO
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * @param string $content
     * @return BlogPostDTO
     */
    public function setContent($content)
    {
        $this->content = $content;
        
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
     * @return BlogPostDTO
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
     * @return BlogPostDTO
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
        return $this->metaTitle;
    }
    
    /**
     * @param string $metaTitle
     * @return BlogPostDTO
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }
    
    /**
     * @param string $publishedAt
     * @return BlogPostDTO
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
        
        return $this;
    }
}
