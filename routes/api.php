<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Api\AuthController;

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

