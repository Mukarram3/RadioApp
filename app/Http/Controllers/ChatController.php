<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
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

            // $oneMonthAgo = Carbon::now()->subMonth();

            // Chat::where('created_at', '<', $oneMonthAgo)
            // ->delete();

            $chats = Chat::with(['user' => function ($query) {
                $query->select(array_diff(Schema::getColumnListing('users'), ['email_verified_at']));
            }])
            ->orderBy('created_at', 'asc')
            ->get();

            return response()->json([
                'error' => false,
                'message' => 'success',
                'data' => $chats,
            ]);
            // $Chat= Chat::with('user')
            // ->orderBy('created_at', 'asc')->get();
            // return response()->json([
            //     'error' => false,
            //     'message' => 'success',
            //     'data' => $Chat,
            // ]);
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
            if($Chat->user_id == auth()->user()->id){
                $Chat->delete();
                return response()->json([
                    'error'=> false,
                    'message'=> 'message deleted'
                    ]);
            }
            else{
                return response()->json([
                    'error'=> true,
                    'message'=> 'Sorry you can"t delete this message'
                    ]);
            }

        }
        catch(Exception $e){
            return response()->json([
                'error'=> true,
                'message'=> $e->getMessage(),
                ]);
            }
    }
}
