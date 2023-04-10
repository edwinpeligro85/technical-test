<?php

namespace App\Features;

use Illuminate\Http\Response;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class VerifyTokenFeature extends Feature
{
    public function handle()
    {
        return $this->run(new RespondWithJsonJob(
            content: '',
            status: Response::HTTP_NO_CONTENT
        ));
    }
}
