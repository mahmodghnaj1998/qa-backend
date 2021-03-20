<?php

namespace App\Http\Controllers\Api;

use App\Events\notin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\qusetion;
use App\Models\qusetion as qusetion_t;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;


class question extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        return  qusetion::collection(qusetion_t::where("language_id", $re->id)->orderByDesc('id')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            "qusetion" => "required|string",
            "user_id" => "required",
            "language_id" => "required"
        ]);
        if ($v->fails()) {
            return response()->json([
                "erorre" => $v->errors()
            ], 201);
        }
        $qusetion = qusetion_t::where([["qusetion", $request->qusetion], ["language_id", $request->language_id]])->get();
        if (count($qusetion) == 0) {
            $new = qusetion_t::create([
                "qusetion" => $request->qusetion,
                "slug" => Str::slug($request->qusetion, "-"),
                "conect" => $request->conect,
                "user_id" => $request->user_id,
                "language_id" => $request->language_id
            ]);
            // $redis = Redis::connection();
            // $redis->publish('message', json_encode(new qusetion($new)));

           // broadcast(new notin(new qusetion($new)));

            return new qusetion($new);
        } else {

            return response()->json([
                "extend" => true,
                "slug" => $qusetion[0]->slug,
                "id" => $qusetion[0]->id,
                "lan" => $qusetion[0]->language

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $find = qusetion_t::find($id);
        return new qusetion($find);
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
        $find = qusetion_t::find($id);
        $val = Validator::make($request->all(), [
            "qusetion" => "required|string|unique:qusetions"
        ]);
        if ($val->fails()) {
            return response()->json([
                "stuts" => "error",
                "error" => $val->errors()

            ], 201);
        }
        $find->qusetion = $request->qusetion;
        $find->slug = Str::slug($request->qusetion) . $find->language_id;
        $find->save();
        return new qusetion($find);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = qusetion_t::find($id);
        $find->answer()->delete();
        $find->like()->delete();
        $find->rating()->delete();
        $find->delete();
        return response()->json(["delete succsess"], 200);
    }
}
