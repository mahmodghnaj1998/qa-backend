<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\qusetion;
use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    protected $fillable=[
        "title"
    ];
    public function qusetion(){
        return $this->hasMany(qusetion::class);
    }
}
