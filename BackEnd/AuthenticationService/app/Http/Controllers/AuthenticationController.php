<?php

namespace App\Http\Controllers;

use App\Features\SignInFeature;
use Lucid\Units\Controller;

class AuthenticationController extends Controller
{
    public function signin()
    {
        return $this->serve(SignInFeature::class);
    }
}
