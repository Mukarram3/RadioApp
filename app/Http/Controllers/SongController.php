<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index(){
        $Song= Song::all();
        return response()->json([
            'error' => true,
            'message' => 'Success',
            'data' => $Song,
        ]);
    }
}
