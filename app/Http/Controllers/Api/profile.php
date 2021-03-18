<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\profile as profiles;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class profile extends Controller
{
    public function updateprofile(Request $re, $id)
    {
        $user = profiles::find($id);
        $user1 = User::find($id);
        if ($re->name) {
            $val = Validator::make($re->all(), [
                "name" => "required|string",
            ]);
            if ($val->fails()) {
                return response()->json([
                    "stuts" => "error",
                    "error" => $val->errors()

                ], 201);
            }
            $user1->name = $re->name;
            $user1->save();
            $user->name = $re->name;
            $user->save();
        }
        if ($re->email) {
            $val = Validator::make($re->all(), [
                "email" => "required|string|unique:users"
            ]);
            if ($val->fails()) {
                return response()->json([
                    "stuts" => "error",
                    "error" => $val->errors()

                ], 201);
            }
            $user1->email = $re->email;
            $user1->save();
            $user->email = $re->email;
            $user->save();
        }
        if ($re->profession) {
            $user->profession = $re->profession;
            $user->save();
        }
        if ($re->img) {
            $user->img = $re->img;
            $user->save();
        }

        return response()->json($user);
    }
   
    public function profile($id)
    {
        return profiles::find($id);
    }

    public function addfollow(Request $re, $id)
    {
        $user = profiles::find($id);
        $user->follow = $re->follow ;
        $user->save();
        return response()->json([$user->follow]);
    }
    public function showfollow($id)
    {
        $user = profiles::find($id);
        return response()->json([$user->follow]);
    }
}
