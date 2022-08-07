<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Mailchimp;
use App\Services\Newsletter;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       app()->bind(Newsletter::class, function () {

           $client = (new ApiClient)->setConfig(
               [
                   'apiKey' => config('services.mailchimp.key'),
                   'server' => 'us13'
               ]
           );

           return new Mailchimp($client);

       });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        \Illuminate\Support\Facades\Gate::define('admin', function (User $user)
        {
            return $user -> username === 'omarjaff95';
        });

     }
}
