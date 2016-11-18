<?php

namespace Ourgarage\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';

    public function posts()
    {
        return $this->belongsToMany('Ourgarage\Blog\Models\Post');
    }
}
