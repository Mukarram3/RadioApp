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

        $data= Subscription::where('user_id', auth()->user()->id)->with('plans')->get();


        if ($data->isNotEmpty()) {
            $subscriptionsData = [];

            foreach ($data as $subscription) {
                $currentDateTime = Carbon::now();
                $expirationDateTime = Carbon::parse($subscription->expiration);

                $timeLeftInHours = $currentDateTime->diffInHours($expirationDateTime);

                $subscriptionsData[] = [
                    'plan_name' => $subscription->plans->title,
                    'subscription_id' => $subscription->id,
                    'time_left_in_hours' => $timeLeftInHours
                ];
            }

            return response()->json([
                'error' => false,
                'message' => 'Success',
                'data' => $subscriptionsData
            ]);
        }

        else{
            return response()->json([
                'error' => true,
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
