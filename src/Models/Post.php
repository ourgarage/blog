<?php

namespace Ourgarage\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    
    protected $table = 'posts';

    protected $fillable = [
        'category_id', 'status', 'title', 'slug', 'content', 'meta_keywords', 'meta_description', 'meta_title',
        'published_at'
    ];

    public function category()
    {
        return $this->belongsTo('Ourgarage\Blog\Models\Category');
    }
}
