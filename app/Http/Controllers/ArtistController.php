<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;
use App\DataTables\ArtistDataTableEditor;
use Yajra\DataTables\Facades\DataTables;

class ArtistController extends Controller
{
    public function getartists(){
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

    public function index()
    {
        return view('Admin.Artist.index');
    }

    // public function artistindexpage(){
    //     $categories= Artist::all();
    //     return view('User.categories',compact('categories'));
    // }

    public function fetchartist(){
        $Category=Artist::all();
        return DataTables::of($Category)->make(true);
    }

    public function store(ArtistDataTableEditor $editor)
    {
        return $editor->process(\request());
    }


}
