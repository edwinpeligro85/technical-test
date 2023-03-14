<?php

namespace App\Domains\Authentication\Jobs;

use Illuminate\Support\Facades\Auth;
use Lucid\Units\Job;

class GetCurrentUserJob extends Job
{
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Auth::user();
    }
}
