<?php

namespace Ourgarage\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    const PAGINATE = 20;

    protected $table = 'blog_categories';

    protected $fillable = [
        'status', 'title', 'slug', 'meta_keywords', 'meta_description', 'meta_title'
    ];

    public function posts()
    {
        return $this->hasMany('Ourgarage\Blog\Models\Post');
    }
}
