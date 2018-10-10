<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
    //
    public function __construct() 
    {
        //Must be logged in to create a post, but any guest can see all posts or a single post
        $this->middleware('auth')->except(['index', 'show']);
    }

    /* 
    * Shows all posts
    */
    public function index(Posts $posts) {       //this is an 'action'

        //Get all posts
        //$posts = Post::latest()->get();
        
        //Ex using DI
        //pass in instance of Posts as argument
        //$posts = $posts->all();


        //Get all posts TWEAKED according to any expected query strings
        $posts = Post::latest()
            ->filter(request(['month','year']))
            ->get();

        //refactored.... USE VIEW COMPOSER
        //Get archive list of posts
        // $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        //     ->groupBy('year','month')
        //     ->orderByRaw('min(created_at) desc')
        //     ->get()
        //     ->toArray();

        //Refactored query for $archives -- removed and placed
        //$archives = Post::archives();

        //typically returns a view w/ a name that corresponds to the action
        return view('posts.index', compact('posts'));
    }

    /* 
    * Displays a specific post
    */
    public function show(Post $post) {

        return view('posts.show', compact('post'));
    }

    /* 
    * Shows create a post page
    */
    public function create() {
        return view('posts.create');

    }

    /* 
    * Create a post
    */    
    public function store() {

        //Laravel-specific validation
        //      if validation fails, will link back to the same page! (THIS IS AWESOME)
        //      returns a populated 'errors' variable
        $this->validate(request(), [
            'title' => 'required|min:10',
            'body' => 'required|min:1'
        ]);
        //==================
        //Create new post
        $newPost = new Post;
        // $newPost->user_id = Auth::find('id');
        $newPost->title = request('title');
        $newPost->body = request('body');
        $newPost->user_id = auth()->id();       //equivalent of auth()->user()->id
        $newPost->save();

        return redirect('/');

        //OR =================
        /*Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);
        //May cause mass assignment error (assigning all the fields at once)
        
        To resolve:
            (A) go to Model, and add a protected $fillable field = ['title', 'body'] (only the fields you want assigned)
                - can get annoying, repetitive
            (B) create $guarded = [] ; what you don't want to allow (nothing at all)
            (C) create a parent class for all your other Eloquent Model classes to extend -- ex. Model.php
                - create  Model.php
                - use Illuminate\Database\Eloquent\Model; ==> use Illuminate\Database\Eloquent\Model as Eloquent;
                - class Model extends Eloquent
                - add $guarded variable here
                ---> all your Models will extend THIS new Model, instead of Eloquent's original Model
        */

        //OR =================
        /* 
            - create a new post:
            auth()->user()->publish(
                new Post(request(['title','body']))
            );

            - create new 'publish' method on User model 
            - move the actual creation code there
            - it will accept the given instance (i.e. this new $post), and will save it. Will resolve all the relationships, etc.
        */
    }
}
