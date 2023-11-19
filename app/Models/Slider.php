<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table= 'sliders';
    protected $fillable= ['image'];

    // public function setimageAttribute($value){
    //     $this->attributes['image']= url('/').'/storage/'.$value;
    // }

}
