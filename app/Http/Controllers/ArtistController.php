<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(){
        $Artist= Artist::all();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $Artist,
        ]);
    }
    public function getartistsongs(Request $request){
        $Song= Song::where('artist_id', $request->artist_id)->get();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $Song,
        ]);
    }
}
