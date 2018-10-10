<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        //Call the guest middleware:  will hide any 'sign in' features when user is logged in;
        //      like a 'filter'-- only guests will have to deal with the view Sign In screen and login process
        //
        //      Here:  if you are signed in, you don't need to see the Login page. But you will be able to access the Logout page
        $this->middleware('guest', ['except' => ['destroy']]);
    }
    /* 
    * Logout
     */
    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }

    /* 
    * Login
     */
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //Attempt to authenticate the user
        //      attempt() method takes care of all the logic of comparing given values w/ what is in DB
        //      if they match, will automatically sign the user in

        //If not authenticated, redirect back
        if(!auth()->attempt(request(['email', 'password'])) )
        {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
                ]);
        }

        //If so, sign in [already done] & redirect home
        return redirect()->home();
    }
}
