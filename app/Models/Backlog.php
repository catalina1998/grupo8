<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    use HasFactory;
    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function user_story()
    {
        return $this->hasMany(User_Story::class);
    }

    public function sprint()
    {
        return $this->hasMany(Sprint::class);
    }
}
