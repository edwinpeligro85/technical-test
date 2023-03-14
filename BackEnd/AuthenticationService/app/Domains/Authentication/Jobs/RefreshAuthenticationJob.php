<?php

namespace App\Domains\Authentication\Jobs;

use Lucid\Units\Job;

class RefreshAuthenticationJob extends Job
{
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return auth()->refresh();
    }
}
