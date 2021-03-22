<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\account_socialite;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite as Socialitee;

class socialite extends Controller
{

    public function redirectToProvider($provider)
    {
        
        $url=Socialitee::driver($provider)->stateless()->redirect()->getTargetUrl();
         return response()->json([
             "url"=>$url
         ]);
    }

    //////////////////////////////////////////////////
    //////////////////////////////////////////////////

    public function handleProviderCallback($provider)
    {

        $user = Socialitee::driver($provider)->stateless()->user();
        $crate = $this->createorfind($user, $provider);
        $token = Auth::tokenById($crate->id);
        return response()->json([
            "token"=>$token
        ]);
    }

    public function  createorfind($user, $proveder)
    {
        $find = account_socialite::where("proveder_id", $user->getId())->where("proveder_name", $proveder)->first();
        if ($find) {
            return $find->user;
        } else {
            $userfind = User::where("email", $user->getEmail())->first();
            if (!$userfind) {
                $userfind = User::create([
                    "email" => $user->getEmail(),
                    "name" => $user->getName(),
                ]);
            }
            profile::create([
                "name" => $userfind->name,
                "email"=>$userfind->email,
                "user_id" => $userfind->id
            ]);
            $userfind->manyaccount()->create([
                "proveder_id" => $user->getId(),
                "proveder_name" => $proveder
            ]);
            return $userfind;
        }
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
