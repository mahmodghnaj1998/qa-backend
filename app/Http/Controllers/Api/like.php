<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\answer as ResourcesAnswer;
use App\Models\like as ModelsLike;
use App\Models\profile;
use Illuminate\Http\Request;


class like extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api')->only(['store','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
       return profile::find($re);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $like=ModelsLike::create([
            "user_id" => $request->user_id,
            "answer_id" => $request->answer_id,
            "qusetion_id" => $request->qusetion_id
        ]);
        return response()->json([
            "like_id"=>$like->id
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $re)
    {
        $find = ModelsLike::where([["answer_id",$re->answer_id],["user_id",$re->user_id]])->first();
        $find->delete();
        return response()->json(["delete succsess"], 200);
    }
}
