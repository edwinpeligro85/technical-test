<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthenticationController extends Controller
{
    public function signin(Request $request)
    {
        return Http::api()
            ->post(config('services.auth.url') . '/signin', $request->all())?->json();
    }

    public function me()
    {
        return Http::api()->get(config('services.auth.url') . '/me')?->json();
    }

    public function refresh()
    {
        return Http::api()->post(config('services.auth.url') . '/refresh')?->json();
    }

    public function logout()
    {
        return Http::api()->post(config('services.auth.url') . '/logout')?->json();
    }

    public function verifyToken()
    {
        return Http::api()->get(config('services.auth.url') . '/verify-token')?->json();
    }
}
