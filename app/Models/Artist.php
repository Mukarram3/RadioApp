<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $table= 'artists';
    protected $fillable= ['name','image'];

    public function songs(){
        return $this->hasMany(Song::class);
    }

    public function scheduleartist(){
        return $this->hasMany(Scheduleartist::class);
    }

    public function follows()
    {
        return $this->belongsTo(Follow::class, 'id','artist_id');
    }

}
