<?php

use App\Providers;

// $stripe = resolve('App\Stripe');

// dd($stripe);
//use App\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//POSTS
Route::get('/', 'PostsController@index')->name('home');
    /*Basic requirements to fulfill this route:
        - controller => PostsController
        - Eloquent model => Post
        - migration (create_posts_table)
    */
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');

//COMMENTS
Route::post('/posts/{post}/comments', 'CommentsController@store');

//TASKS
Route::get('/tasks', 'TasksController@index'); //Route receving request on & controller@method --- method for showing ALL of a resource = 'index'
Route::get('/tasks/{task}', 'TasksController@show');

// REGISTER
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
//LOGIN
//      View login page
Route::get('/login', 'SessionsController@create')->name('login');
//      Submit a new login
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

//w/o controller
// Route::get('/tasks/{id}', function ($id) {

//     //die and dump -- literally just spits out the value
//     //dd($id);

//     $task = Task::find($id);

//     //dd($task);

//     return view('tasks.show', compact('task'));
// });

