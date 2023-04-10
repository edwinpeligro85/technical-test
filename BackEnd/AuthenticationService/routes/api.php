<?php

use App\Http\Controllers\AuthenticationController;
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

Route::post('signin', [AuthenticationController::class, 'signin']);
Route::post('logout', [AuthenticationController::class, 'logout']);
Route::post('refresh', [AuthenticationController::class, 'refresh']);
Route::get('me', [AuthenticationController::class, 'me']);
Route::get('verify-token', [AuthenticationController::class, 'verifyToken']);
