<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $fillable = [
        'rating',
        'qusetion_id',
        'user_id',
    ];
public function qusetion(){
    return $this->belongsTo(qusetion::class);
}
}
