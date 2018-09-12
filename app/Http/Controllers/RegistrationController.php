<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create(){
        return view('registration.create');
    }

    public function store(RegistrationForm $form){
        //Validate the form

        /* Can be replaced with a Request class
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
            //confirmed - request field password must match request field password_confirmation
        ]);*/

        //create and save the user
        //$user = User::create(request(['name', 'email', 'password']));

        $form->persist();
        /* RegistrationForm persist method
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        //sign in user
        \auth()->login($user);

        //send welcome mail
        \Mail::to($user)->send(new Welcome($user));
        */

        // Flash a message
        //session('message', 'Here is a default message'); // entire session duration
        session()->flash('message', 'Thanks so much for signing up!'); // one page load

        //redirect
        return redirect()->home();
    }
}
