<?php

namespace App\Http\Resources;

use App\Models\language;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class answer extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $count_not = 0;
        if ($this->count_not) {
            $count_not = $this->count_not;
        } else {
            $count_not = 0;
        }
        return [
            "id" => $this->id,
            "answer" => $this->answer,
            "user" => profile::find($this->user->id),
            "user_qusetion" => profile::find($this->qusetion->user_id),
            "qusetion" => $this->qusetion,
            "language" => language::find($this->qusetion->language_id),
            "likes" => ["0"],
            "count_like" => 0,
            "read"=>$this->read,
            "count_not" => $count_not,
            "date" => $this->created_at->diffForHumans()
        ];
    }
}
