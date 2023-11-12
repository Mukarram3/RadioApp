<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LiveDj extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken');
    }
    public function send(Request $request){

        try{
            $Chat= new \App\Models\Livedj();
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

            $latestRecords = \App\Models\Livedj::orderBy('created_at', 'desc')
                ->take(10)
                ->get();
            $latestRecordIds = $latestRecords->pluck('id')->all();
            $Chat=\App\Models\Livedj::whereNotIn('id', $latestRecordIds)->delete();

            $Chat= \App\Models\Livedj::with('user')->orderBy('created_at', 'asc')->get();
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
}
