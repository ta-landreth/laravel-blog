<?php

namespace App;

use App\Model;

class Comment extends Model
{
    //
    public function post() 
    {
        return $this->belongsTo(Post::class);
    }

    public function user() // $comment->user   can be retrieved!
    {
        return $this->belongsTo(User::class);
    }
}
