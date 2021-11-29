<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // validation data
        $validated = $this->validate($request,[
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);

        if(! auth()->attempt($validated)){
            return response([
                'data' => 'اطلاغات وارد شده معتبر نیست',
                'status' => 'error'
            ]);
        }

        return new UserResource(auth()->user());
    }

    public function register(Request $request)
    {
        //validation data
        $validated = $this->validate($request,[
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        return new UserResource($user);
    }
}
