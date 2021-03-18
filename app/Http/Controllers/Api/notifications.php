<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\answer as ResourcesAnswer;
use App\Models\answer;
use App\Models\qusetion;
use App\Http\Resources\qusetion as qusetion_r;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ans;
use Illuminate\Http\Request;

class notifications extends Controller
{
    public function show($id)
    {
        $qusetion = qusetion::where("user_id", $id)->get();
        $id_answer = [];
        foreach ($qusetion as $value) {
            array_push($id_answer, $value->id);
        }
        $answer = answer::whereIn("qusetion_id", $id_answer)
            ->select(
                "id",
                "answer",
                "user_id",
                "qusetion_id",
                "read",
                "created_at",
                DB::raw("count(id) as count_not")
            )
            ->orderBy('id', "desc")
            ->selectRaw('MAX(id) as max')
            ->groupBy('qusetion_id')
            ->paginate(100);
        $max = [];
        foreach ($answer as  $value) {
            array_push($max, $value->max);
        }
        $answer_end = answer::whereIn("id", $max)->orderBy('id', "desc")->get();

        return  ResourcesAnswer::collection($answer_end);
    }
    public function read(Request $re)
    {
        $an = answer::find($re->id);
        $an->read = 0;
        $an->save();
    }
    public function qua(Request $re)
    {
        $qua = qusetion::whereIn("language_id", json_decode($re->follow))->orderBy('id', "desc")->paginate(50);
        return  qusetion_r::collection($qua);
    }
}
