<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\qusetion;
class answer extends Model
{
    protected $fillable=[
        "answer","user_id","qusetion_id","read"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function qusetion(){
        return $this->belongsTo(qusetion::class);
    }
    public function like(){
        return $this->hasMany(like::class);
    }
    
}
