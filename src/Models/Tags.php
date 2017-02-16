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

    /**
     * @param integer $take
     * @return object
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
}
