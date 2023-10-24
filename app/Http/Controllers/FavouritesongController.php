<?php

namespace App\Http\Controllers;

use App\Models\Favouritesong;
use Exception;
use Illuminate\Http\Request;

class FavouritesongController extends Controller
{
    public function getsong(Request $request){
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'songs' => Favouritesong::where('user_id',$request->user_id)->get(),
        ]);
    }
    public function storesong(Request $request){
        try{
            $Favouritesong= new Favouritesong();
            $Favouritesong->user_id= $request->user_id;
            $Favouritesong->song_id= $request->song_id;
            $Favouritesong->save();
            return response()->json([
                'error' => false,
                'message' => 'Success'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
