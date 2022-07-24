<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }

    public function create()
    {
        return view('register.login');
    }

    public function store()
    {

       $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

       if(! auth()->attempt($attributes))
       {
           return back()->withInput()->withErrors(['email' => 'Your credentails could not be verified']);

       }

       session()->regenerate();

       return redirect('/');

    }
}
