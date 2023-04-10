<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Http::macro('api', function () {
            $headers = ['Accept' => 'application/json'];

            if ($authorizationHeader = request()->header('Authorization')) {
                $headers['Authorization'] = $authorizationHeader;
            }

            return Http::withHeaders($headers);
        });
    }
}
