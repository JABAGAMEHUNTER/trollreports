<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::get('/auth/redirect', function() {
	return Socialite::driver('github')->redirect();
});
*/

Route::get('/auth/redirect', function() {
	return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function() {
	$githubUser = Socialite::driver('github')->user();
	$user = User::updateOrCreate([
		'github_id' => $githubUser->id,
	], [
		'name' => $githubUser->name,
		'email'	=> $githubUser->email,
		'github_token' => $githubUser->token,
		'github_refresh_token' => $githubUser->refreshToken,
	]);

	Auth::login($user);
	$user = Socialite::driver('github')->user();
	$user->token
	return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});
