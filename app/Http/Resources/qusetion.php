<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class qusetion extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $sum = [];
        foreach ($this->rating as  $value) {
            array_push($sum,$value->rating);
        }
        $count = count($sum);
        if($count == 0 ){
            $count = 1;
        }
        return
         [
            "id"=>$this->id,
            "qusetion"=>$this->qusetion,
            "conect"=>$this->conect,
            "slug"=>$this->slug,
            "user"=>$this->user,
            "profile"=>$this->user->profile,
            "language"=>$this->language,
            "rating"=>array_sum($sum) / $count,
            "date" => $this->created_at->diffForHumans()
        ];
    }
}
