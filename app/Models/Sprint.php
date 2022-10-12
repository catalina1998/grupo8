<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;

    public function backlog()
    {
        return $this->belongsTo(Backlog::class);
    }
    public function user_story()
    {
        return $this->hasMany(User_story::class);
    }

}
