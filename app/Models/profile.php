<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class profile extends Model
{
    protected $fillable = [
        'name', 'email', 'user_id', 'profession', 'img',"follow"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
