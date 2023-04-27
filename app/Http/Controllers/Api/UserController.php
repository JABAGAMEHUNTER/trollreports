<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index() 
   {
        $users = User::paginate();

        return UserResource::collection($users);
   }

   public function store(Request $request)
   {
        
        $data = $request->all();
        $user = new User();
        $user['password'] = bcrypt($request->password);
        $user->fill($data);
        $user->save();
        return new UserResource($user);
   }
}
