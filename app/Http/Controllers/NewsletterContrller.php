<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterContrller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        try {

            $newsletter = new Newsletter();

            $newsletter->subscribe(request('email'));

        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                    'email' => "$e"
                ]
            );
        }
        return redirect('/')
            ->with('message', 'Successfully subscribed!');
    }
}
