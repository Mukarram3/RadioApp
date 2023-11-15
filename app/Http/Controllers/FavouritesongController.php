<?php

namespace App\Http\Controllers;

use App\Models\Favouritesong;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class FavouritesongController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken');
    }
    public function getsong(Request $request){
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'song' => Favouritesong::where('user_id',auth()->user()->id)
            ->select('*')
            ->select(array_diff(Schema::getColumnListing('songs'), ['channel_id','plan_id','type']))
            ->with('song')
            ->get(),
        ]);
    }
    public function song(Request $request){
        try{

                if($request->favourite == 'true'){

                $Favouritesong= new Favouritesong();
                $Favouritesong->user_id= auth()->user()->id;
                $Favouritesong->song_id= $request->song_id;
                $Favouritesong->save();
                return response()->json([
                    'error' => false,
                    'message' => 'Song Liked'
                ]);

                }
                else{

                    $Favouritesong= Favouritesong::where('user_id',auth()->user()->id)->where('song_id',$request->song_id);
                    $Favouritesong->delete();
                    return response()->json([
                        'error' => false,
                        'message' => 'Song Disliked'
                    ]);
                }

        }
        catch(Exception $e){
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
