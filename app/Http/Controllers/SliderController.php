<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $slider= Slider::all();
        return response()->json([
            'error' => true,
            'message' => 'Success',
            'data' => $slider,
        ]);
    }
}
