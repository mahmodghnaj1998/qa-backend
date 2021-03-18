<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\language;
use App\Models\answer;

class qusetion extends Model
{
    protected $fillable=[
        'qusetion','slug','conect','user_id','language_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function language(){
        return $this->belongsTo(language::class);
    }
    public function answer(){
        return $this->hasMany(answer::class);
    }
    public function rating(){
        return $this->hasMany(rating::class);
    }
    public function like(){
        return $this->hasMany(like::class);
    }

}
