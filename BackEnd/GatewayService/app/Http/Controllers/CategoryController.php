<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get(config('services.categories.url') . '/categories');
        return $response->json();
    }

    public function store(Request $request)
    {
        $response = Http::post(config('services.categories.url') . '/categories', $request->all());
        return $response->json();
    }

    public function show(Request $request, $id)
    {
        $response = Http::get(config('services.categories.url') . "/categories/{$id}");
        return $response->json();
    }

    public function update(Request $request, $id)
    {
        $response = Http::put(config('services.categories.url') . "/categories/{$id}", $request->all());
        return $response->json();
    }

    public function destroy(Request $request, $id)
    {
        $response = Http::delete(config('services.categories.url') . "/categories/{$id}");
        return $response->json();
    }
}
