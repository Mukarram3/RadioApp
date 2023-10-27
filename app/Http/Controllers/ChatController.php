<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Exception;
use Illuminate\Http\Request;
use URL;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken');
    }
    public function send(Request $request){

        try{
            $Chat= new Chat();
            $Chat->user_id= auth()->user()->id;
            $Chat->message= $request->message;
            $Chat->save();
            return response()->json([
                'error' => false,
                'message' => 'Success'
            ]);
    }
        catch(Exception $e){
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function receive(Request $request){
        try{
            $Chat= Chat::with('user')->get();
            return response()->json([
                'error' => false,
                'message' => 'success',
                'data' => $Chat,
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function delete(Request $request){
        try{
            $Chat= Chat::find($request->id);
            $Chat->delete();
            return response()->json([
                'error'=> false,
                'message'=> 'message deleted'
                ]);
        }
        catch(Exception $e){
            return response()->json([
                'error'=> true,
                'message'=> $e->getMessage(),
                ]);
            }
    }
}
