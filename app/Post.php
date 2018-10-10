<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use Carbon\Carbon;

class Post extends Model
{
    public function comments() {
        return $this->hasMany(Comment::class)->latest();      //COmment::class returns a string representation of the full class path  pHP 5.6
    }

    public function user() {
        return $this->belongsTo(User::class);       // $post->user  can be retrieved;  OR even  $comment->post->user
    }

    public function addComment() {
      
        //One option:
        Comment::create([
            'body' => request('id'),
            'post_id' => $this->id
            ]);

        //Another option:
        //      using the comments() function [above]
        //      uses the relationship that we defined above, to automagically set the post_id also
        //$this->comments()->create(compact('body'));
    }

    public function scopeFilter($query, $filters)
    {
        //Receives current query (whatever it is) and adds this to it

        if(!empty($filters))
        {  
            if($month = $filters['month'])
            {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
            if($year = $filters['year'])
            {
                $query->whereYear('created_at', $year);
            }
        }
    }

    //Call this as a method on the model:  (ex) \App\Post::archives()
    //static so it's available everywhere?
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
