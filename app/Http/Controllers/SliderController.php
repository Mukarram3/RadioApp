<?php

namespace App\Http\Controllers;

use App\DataTables\SliderDataTableEditor;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only'=> ['getslider']]);
    }
    public function getslider(){
        $slider= Slider::all();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $slider,
        ]);
    }

    public function index()
    {
        return view('Admin.Slider.index');
    }

    public function fetchslider(){
        $Slider=Slider::all();
        return DataTables::of($Slider)->make(true);
    }

    public function store(SliderDataTableEditor $editor)
    {
        return $editor->process(\request());
    }
}
