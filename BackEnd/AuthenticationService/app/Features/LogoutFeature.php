<?php

namespace App\Features;

use App\Domains\Authentication\Jobs\LogoutJob;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class LogoutFeature extends Feature
{
    public function handle()
    {
        $this->run(LogoutJob::class);

        return $this->run(new RespondWithJsonJob(
            trans('auth.loggedout')
        ));
    }
}
