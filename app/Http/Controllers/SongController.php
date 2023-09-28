<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index(){
        $Song= Song::all();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $Song,
        ]);
    }

    public function getcategorysongs(Request $request){
        $Song= Song::where('category_id', $request->category_id)->get();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $Song,
        ]);
    }
}
