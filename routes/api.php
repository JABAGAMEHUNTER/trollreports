<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LoginController;

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->stateless()->redirect();
});

Route::get('/auth/callback', function (){
    $user = Socialite::driver('github')->stateless()->user();
});

Route::get('/', function() {
        return response()->json([
            'success' => true
        ]);
});

#rotas do sanctum (autenticador)

Route::prefix('auth')->group(function() {
    Route::post('login', [LoginController::class, 'login'])->middleware('auth:sanctum');
    Route::post('logout', [LoginController::class, 'logout']);
    Route::post('register', [LoginController::class, 'register']);
});
