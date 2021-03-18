<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\language as languages;

class language extends Controller
{
    public function show(){
    return   languages::all();
    }
    public function add(Request $re)
    {
        $lan_found= languages::where("title",$re->title)->get();
        if(count($lan_found) == 0){
          $lan= languages::create([
                "title"=>$re->title
            ]);
            return response()->json([$lan]);
        }else{
            return response()->json(["error"]);
        }
        

     }
}
