<?php

namespace App\Features;

use App\Domains\Authentication\Jobs\GetCurrentUserJob;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetMeFeature extends Feature
{
    public function handle()
    {
        return $this->run(new RespondWithJsonJob(
            $this->run(GetCurrentUserJob::class)
        ));
    }
}
