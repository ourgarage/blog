<?php

namespace Ourgarage\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'tag'
    ];

    public function posts()
    {
        return $this->belongsToMany('Ourgarage\Blog\Models\Post', 'post_tags', 'tag_id', 'post_id');
    }

    /**
     * @param integer $take
     * @return object
     */
    public static function popularTags($take)
    {
        $tags = Tags::selectRaw("tags.*, count('post_tags.tag_id') as tags_count")
            ->leftJoin('post_tags', 'post_tags.tag_id', '=', 'tags.id')
            ->groupBy('tags.id')
            ->orderBy('tags_count', 'desc')
            ->take($take)->get();

        return $tags;
    }
}
