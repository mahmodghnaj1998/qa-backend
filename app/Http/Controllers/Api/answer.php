<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\answer as answert;
use App\Http\Resources\answer as answerapi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\like_r;
use Illuminate\Support\Facades\Redis;

class answer extends Controller
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
            "answer" => "required|string",
            "user_id" => "required",
            "qusetion_id" => "required"
        ]);
        if ($v->fails()) {
            return response()->json([
                "error" => $v->errors()
            ], 201);
        }
        $new = answert::create([
            "answer" => $request->answer,
            "user_id" => $request->user_id,
            "qusetion_id" => $request->qusetion_id,
            "read"=>1
        ]);
        $redis = Redis::connection();
        $redis->publish('message', json_encode(new answerapi($new)));
        return  new answerapi($new);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('answers')
            ->where('answers.qusetion_id', '=', $id)
            ->leftJoin('likes', 'answers.id', '=', 'likes.answer_id')
            ->join('users', 'answers.user_id', 'users.id')
            ->join('profiles', 'answers.user_id', 'profiles.id')
            ->select(
                "answers.id",
                "likes.id as id_like",
                "profiles.img as img",
                "answers.user_id as id_user",
                "answers.answer",
                'users.name as name',
                'answers.created_at',
                DB::raw('count(answers.id) as count_like'),
                DB::raw("group_concat(likes.user_id) as has_likes")
            )
            ->groupBy('answers.id')
            ->orderBy('count_like', "desc")
            ->paginate(10);

        return like_r::collection($users);
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
        $find = answert::find($id);
        $v = Validator::make($request->all(), [
            "answer" => "required|string",
        ]);
        if ($v->fails()) {
            return response()->json([
                "error" => $v->errors()
            ], 201);
        }
        $find->answer = $request->answer;
        $find->save();
        return  new answerapi($find);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = answert::find($id);
        $find->like()->delete();
        $find->delete();
        return response()->json(["delete succsess"], 200);
    }
}
