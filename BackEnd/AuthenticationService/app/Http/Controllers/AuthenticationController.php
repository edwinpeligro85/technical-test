<?php

namespace App\Http\Controllers;

use App\Features\GetMeFeature;
use App\Features\RefreshFeature;
use App\Features\SignInFeature;
use Lucid\Units\Controller;

class AuthenticationController extends Controller
{
    public function signin()
    {
        return $this->serve(SignInFeature::class);
    }

    public function me()
    {
        return $this->serve(GetMeFeature::class);
    }

    public function refresh()
    {
        return $this->serve(RefreshFeature::class);
    }
}
