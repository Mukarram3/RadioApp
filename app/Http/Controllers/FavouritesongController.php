<?php

namespace App\Http\Controllers;

use App\Models\Favouritesong;
use Exception;
use Illuminate\Http\Request;

class FavouritesongController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('CheckExpiredToken');
    // }
    public function getsong(Request $request){
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'song' => Favouritesong::where('user_id',auth()->user()->id)
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
                    'message' => 'Success'
                ]);

                }
                else{

                    $Favouritesong= Favouritesong::where('user_id',auth()->user()->id)->where('song_id',$request->song_id);
                    $Favouritesong->delete();
                    return response()->json([
                        'error' => false,
                        'message' => 'do Success'
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
