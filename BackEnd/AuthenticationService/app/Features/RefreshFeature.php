<?php

namespace App\Features;

use App\Traits\ApiResponder;
use Illuminate\Http\Response;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class RefreshFeature extends Feature
{
    use ApiResponder;

    public function handle()
    {
        return $this->run(new RespondWithJsonJob(
            status: Response::HTTP_OK,
            content: $this->respondWithToken(
                $this->run(RefreshAuthenticationJob::class)
            ),
        ));
    }
}
