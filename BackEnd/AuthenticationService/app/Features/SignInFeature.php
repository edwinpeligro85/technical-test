<?php

namespace App\Features;

use App\Domains\Authentication\Jobs\AuthenticationAttemptJob;
use App\Domains\Authentication\Jobs\GetCurrentUserJob;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Lucid\Domains\Http\Jobs\RespondWithJsonErrorJob;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class SignInFeature extends Feature
{
    use ApiResponder;

    public function handle(Request $request)
    {
        if (!$token = $this->run(new AuthenticationAttemptJob($request->validated()))) {
            return $this->run(new RespondWithJsonErrorJob(
                status: Response::HTTP_UNAUTHORIZED,
                message: trans('auth.password'),
            ));
        }

        return $this->run(new RespondWithJsonJob(
            status: Response::HTTP_OK,
            content: [
                'auth' => $this->respondWithToken($token),
                'user' => $this->run(GetCurrentUserJob::class)
            ],
        ));
    }
}
