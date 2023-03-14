<?php

namespace App\Domains\Authentication\Jobs;

use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class AuthenticationAttemptJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $credentials) { }

    /**
     * > It returns true if the user is authenticated, false otherwise
     * 
     * @return bool A boolean value.
     */
    public function handle()
    {
        return Auth::attempt($this->credentials);
    }
}
