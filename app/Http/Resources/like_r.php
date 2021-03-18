<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;


class like_r extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $str = explode(",", $this->has_likes);
        $user = (object) [
            "id" => $this->id_user,
            "name" => $this->name,
        ];
        return [
            "id" => $this->id,
            "id_like"=>$this->id_like,
            "img"=>$this->img,
            "answer" => $this->answer,
            "answer" => $this->answer,
            "user" => $user,
            "count_like" => $this->count_like,
            "likes" => $str,
            "date" => Carbon::parse($this->created_at)->diffForHumans()


        ];
    }
}
