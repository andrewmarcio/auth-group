<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Presentation\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')
    ->name('api.auth.')
    ->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('user.login');
    });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
