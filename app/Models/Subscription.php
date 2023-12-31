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
        return $this->belongsTo(Plan::class,'plan_id');
    }
}
