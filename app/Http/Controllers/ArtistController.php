<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;
use App\DataTables\ArtistDataTableEditor;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\Facades\DataTables;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only'=> ['getartists','getartistsongs']]);
    }
    public function getartists(){

        $Artist= Artist::where('is_scheduled', false)->with(['follows' => function ($query) {
            $query->where('user_id', auth()->user()->id);
        }])
        ->get();

        $Artist->each(function ($user) {
            $user->isFollow = $user->follows !== null && $user->follows->count() > 0;
            unset($user->follows);
        });

        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $Artist,
        ]);
    }
    public function getartistsongs(Request $request){

        $Song= Song::where('artist_id', $request->artist_id)->where('stream_type','radio station')
        ->with(['favsongs' => function ($query) {
            $query->where('user_id', auth()->user()->id);
        }])
        ->select('*')
        ->select(array_diff(Schema::getColumnListing('songs'), ['channel_id','plan_id','type']))
        ->get();

        $Song->each(function ($song) {
            $song->isFavourite = $song->favsongs !== null && $song->favsongs->count() > 0;
            unset($song->favsongs);
        });

        return response()->json([
            'error' => false,
            'message' => 'Success',
            'artist_songs' => $Song,
        ]);
    }

    public function index()
    {
        return view('Admin.Artist.index');
    }

    public function fetchartist(){
        $Category=Artist::all();
        return DataTables::of($Category)->make(true);
    }

    public function store(ArtistDataTableEditor $editor)
    {
        return $editor->process(\request());
    }


}
