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
            'username' => 'required|string|min:4|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', Password::min(8)->letters()->numbers()]
    ]);



        $user = User::create($attributes);

        auth()->login($user);

         return redirect('/');
     }
}
