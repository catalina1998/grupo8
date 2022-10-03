<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_story extends Model
{
    use HasFactory;

    public function backlog()
    {
        return $this->belongsTo(Backlog::class);
    }
}
