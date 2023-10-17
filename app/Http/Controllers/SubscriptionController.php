<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request){
        try{
            $Subscription= new Subscription();
            $Subscription->user_id= $request->user_id;
            $Subscription->plan_id= $request->plan_id;
            $plan= Plan::find($request->plan_id);
            $Subscription->expiration= $plan->expiration;
            $Subscription->cost= $plan->cost;
            $Subscription->save();
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
