<?php

namespace Ourgarage\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    const STATUS_DRAFT = 2;
    const STATUS_PUBLISHED = 3;

    protected $table = 'posts';

    protected $dates = ['published_at'];

    protected $fillable = [
        'category_id', 'status', 'title', 'slug', 'content', 'meta_keywords', 'meta_description', 'meta_title'
    ];

    public function category()
    {
        return $this->belongsTo('Ourgarage\Blog\Models\Category');
    }
}
