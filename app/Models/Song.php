<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;


    public function hasartist(){
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }

    public function haschannel(){
        return $this->belongsTo(Channel::class, 'channel_id', 'id');
    }

    public function hascategory(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function hasplan(){
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function favsongs()
    {
        return $this->belongsTo(Favouritesong::class, 'id','song_id');
    }
}
