<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {

    Route::group(['prefix' => 'auth', 'middleware' => 'auth.token'], function () {
        Route::get('/me', [AuthenticationController::class, 'me']);
        Route::post('/signin', [AuthenticationController::class, 'signin'])
            ->withoutMiddleware('auth.token');
        Route::post('/logout', [AuthenticationController::class, 'logout']);
        Route::post('/refresh', [AuthenticationController::class, 'refresh']);
        Route::post('/verify-token', [AuthenticationController::class, 'verifyToken']);
    });

    Route::middleware('auth.token')->group(function () {

        Route::get('/categories', [CategoryController::class, 'index']);
        Route::post('/categories', [CategoryController::class, 'store']);
        Route::get('/categories/{id}', [CategoryController::class, 'show']);
        Route::put('/categories/{id}', [CategoryController::class, 'update']);
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
    });
    
});
