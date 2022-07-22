<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

use Illuminate\Validation\Rules\Password;
class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => ['required', Password::min(8)->letters()->numbers()]
    ]);



        User::create($attributes);
         return redirect('/');
     }
}
