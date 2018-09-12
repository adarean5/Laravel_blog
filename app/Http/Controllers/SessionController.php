<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    public function create(){
        return(view('sessions.create'));
    }

    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }

    public function store(){
        //Attempt to authenticate the user
        //If not, redirect back
        //Sign in the user
        //dd(\request(['email', 'password']));
        //auth()->attempt(request(['email', 'password']));

        if (!auth()->attempt(\request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

        //Redirect
        return redirect()->home();
    }
}
