<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
 use Illuminate\Support\Facades\Route;

Route::post('newsletter/member/add', function () {

    request()->validate([
        'email' => 'required|email'
    ]);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us13'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('30298d469a', [
            "email_address" => request('email'),
            "status" => "subscribed"
        ]);
    } catch (\Exception $e) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'Your email could not be added to the news letter list.'
            ]
        );
    }
    return redirect('/')->with('Success');
});


Route::get('/', [PostController::class, 'index'] )->name('home');

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::post('/posts/{post}/comments', [CommentController::class, 'store']);

Route::post('/posts/{post}/comments/remove/{id}', [CommentController::class, 'destroy']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');

Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

