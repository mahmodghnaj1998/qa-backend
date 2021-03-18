<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\rating;
use Illuminate\Http\Request;

class ratingcontroller extends Controller
{
    public function save(Request $re)
    {
        $fond = rating::where([["qusetion_id", $re->id], ["user_id", $re->user_id]])->get();
        if (count($fond) == 0) {
            $new = rating::create([
                "qusetion_id" => $re->id,
                "user_id" => $re->user_id,
                "rating" => $re->rating
            ]);
            return response()->json([
                "new" => $new
            ]);
        } else {
            $fond[0]->delete();
            $new = rating::create([
                "qusetion_id" => $re->id,
                "user_id" => $re->user_id,
                "rating" => $re->rating
            ]);
            return response()->json([
                "new" => $new
            ]);
        }
    }
}
