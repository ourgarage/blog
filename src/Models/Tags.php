<?php

namespace Ourgarage\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'blog_tags';

    protected $fillable = [
        'tag'
    ];

    public function posts()
    {
        return $this->belongsToMany('Ourgarage\Blog\Models\Post', 'blog_post_tags', 'tag_id', 'post_id');
    }
}
