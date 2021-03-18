<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class like extends Model
{
   protected $fillable=[
       "user_id","answer_id","qusetion_id"
   ];
   public function user(){
       return $this->belongsTo(User::class);
   }
   public function answer(){
       return $this->belongsTo(answer::class);
   }
   public function qusetion(){
    return $this->belongsTo(qusetion::class);
}

}
