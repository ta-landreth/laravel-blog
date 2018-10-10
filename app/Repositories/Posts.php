<?php

namespace App\Repositories;

use App\Post;
use App\Task;

class Posts
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
        //if Posts itself needs something else to work...... Laravel will try to resolve/create when it resolves/creates a Posts instance1
    }
    public function all()
    {
        return Post::all();
    }

}