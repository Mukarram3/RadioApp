<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $table= 'channels';
    protected $fillable= ['title','image','type','artist_id','plan_id'];

    public function plans()
{
    return $this->hasOne(Plan::class, 'id', 'plan_id');
}

public function artist()
{
    return $this->belongsTo(Artist::class, 'artist_id', 'id');
}
}
