<?php

namespace App\Http\Requests;

use App\Mail\Welcome;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
        ];
    }

    public function persist(){
        // request(['array']) identical to request->only(['array'])

        //you can replace the array with $this->only(['name', 'email', 'password']) since $this is
        // a request, but we need to bcrypt in this case
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        //sign in user
        \auth()->login($user);

        //send welcome mail
        Mail::to($user)->send(new Welcome($user));

        //redirect
        return redirect()->home();
    }
}
