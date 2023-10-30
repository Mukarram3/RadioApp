<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table='subscriptions';

    public function plans()
    {
        return $this->hasMany(Plan::class,'id');
    }
}
