<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['post_id', 'author_name', 'message'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
