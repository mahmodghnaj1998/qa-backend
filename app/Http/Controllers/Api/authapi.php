<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\profile;
use Illuminate\Support\Facades\Hash;

class authapi extends Controller
{
    
  
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = Auth::setTTl(43800)->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 201);
        }

        return $this->respondWithToken($token);
    }
    public function register(Request $re)
    {
        $val = Validator::make($re->all(), [
            "name" => "required|string",
            "email" => "required|string|unique:users",
            "password" => "required|string|confirmed|min:6"
        ]);
        if ($val->fails()) {
            return response()->json([
                "stuts" => "error",
                "error" => $val->errors()

            ], 201);
        }
        $user = User::create([
            "name" => $re->name ,
            "email" => $re->email,
            "password" => Hash::make($re->password)
        ]);
        profile::create([
            "name" => $user->name,
            "email" => $user->email,
            "user_id"=>$user->id,
            "follow"=>"[]"
        ]);

        $only = $re->only(["email", "password"]);
        if ($token = Auth::setTTl(43800)->attempt($only)) {
            return $this->respondWithToken($token);
        }
    }
    public function me()
    {

        return response()->json(auth()->user());
    }
    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            
        ]);
    }
}
