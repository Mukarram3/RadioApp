<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favouritesong extends Model
{
    use HasFactory;

    public function song(){
        return $this->belongsTo(Song::class,'song_id','id');
    }
}
