<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken');
    }
    public function store(Request $request){
        try{
            $Subscription= new Subscription();
            $Subscription->user_id= auth()->user()->id;
            $Subscription->plan_id= $request->plan_id;
            $plan= Plan::find($request->plan_id);
            $Subscription->expiration= Carbon::now()->addMonths($plan->expiration)->format('Y-m-d H:i:s');
            $Subscription->cost= $plan->cost;
            $Subscription->save();
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

    public function time_left(){

        try{

        $data= Subscription::where('user_id', auth()->user()->id)->first();

        if($data){
            $created_at_dt = Carbon::parse($data->created_at);
            $expiration_dt = Carbon::parse($data->expiration);

        $time_difference = $expiration_dt->diffInHours($created_at_dt);

        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $time_difference
        ]);

        }

        else{
            return response()->json([
                'error' => false,
                'message' => 'Please Subscribe to plan First',
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


    public function expire(Request $request){
        try{
        $data= Subscription::where('user_id', auth()->user()->id)->where('plan_id',$request->plan_id)->first();
        $data->delete();
        return response()->json([
            'error' => false,
            'message' => 'Success',
        ]);
        }
        catch(Exception $e){
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }

    }
}
