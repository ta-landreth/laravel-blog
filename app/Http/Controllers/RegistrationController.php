<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /* 
    * Create a user
    */
    public function create() 
    {
        return view('registration.create');
    }

    public function store()
    {
        //Redirect to new page

        //Validate form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        //Create & save user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        //Log in the user
        //          - use an 'Auth facade'
        //            \Auth::login();
        //          - use a 'helper function'
        auth()->login($user);

        //Return them to a page

        return redirect()->home();
    }
}
