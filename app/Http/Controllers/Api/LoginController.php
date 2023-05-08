<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 


class LoginController extends Controller
{
    public function login(Request $request)
    {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();
            
       if (! $user || ! Hash::check($request->password, $user->password))
            {
            return response()
                        ->json([
                            'error' => 'Email or password incorrect'
                        ]);
            } else {
            return response()
                        ->json([
                                'user' => $user,
                        ]);
            }
    }

    public function register(Request $request)
    {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
            $user = new User;
            $user->fill($data);
            $user->save();
            $token = $user->createToken('authToken')->plainTextToken;
            $created_user = new UserResource($user);
            return response()->json([
                            'user' => $created_user,
                            'token' => $token,
                            'token_type' => 'Bearer',
            ]);
    }
}
