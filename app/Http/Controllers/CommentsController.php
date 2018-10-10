<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;

class CommentsController extends Controller
{
    public function store(Post $post) {
        //Laravel-specific validation
        //      if validation fails, will link back to the same page! (THIS IS AWESOME)
        //      returns a populated 'errors' variable
        $this->validate(request(), [
            'body' => 'required'
        ]);

        //Method that is more descriptive of relationship between comment and post: exists on Post Model
        //$post->addComment(request());
        //
        //This doesn't work for some reason.....

        Comment::create([
            'body' => request('body'),
            'post_id' => $post->id,
            'user_id' => auth()->id()
        ]);

        return back();

    }
}