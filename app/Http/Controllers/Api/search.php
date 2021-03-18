<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\qusetion;
use Illuminate\Http\Request;
use \App\Http\Resources\search as search_r;

class search extends Controller
{
    public function search(Request $re)
    {
        if (strlen($re->search) >= 2) {
            $new = qusetion::where('qusetion', 'LIKE', '%' . $re->search . '%')->get();

            return search_r::collection($new);
            //return $new;
        } else return ["data" => []];
    }
}
