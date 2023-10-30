<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table='plans';
    protected $fillable= ['title','features','cost','status','expiration'];

    public function subscriptions()
{
    return $this->hasMany(Subscription::class, 'plan_id', 'id');
}
}
