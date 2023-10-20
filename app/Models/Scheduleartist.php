<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduleartist extends Model
{
    use HasFactory;
    protected $table = 'scheduleartists';
    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }
}
