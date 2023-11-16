<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

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

            $Chat= \App\Models\Livedj::with(['user' => function ($query) {
                $query->select(array_diff(Schema::getColumnListing('users'), ['email_verified_at']));
            }])

            ->orderBy('created_at', 'asc')->get();
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

    public function stream_url(){
        $LiveDj= Song::where('stream_type', 'live dj')
        ->select('stream_url')
        ->first();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $LiveDj,
        ]);
    }
}
