<?php

namespace App\Http\Controllers;

use App\DataTables\PlanDataTableEditor;
use App\Models\Plan;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only'=> ['getplans']]);
    }
    public function getplans(){


            $plans = Plan::where('status', true)->with('subscriptions')->get();

            $plans->each(function ($plan) {
                $subscriptions = $plan->subscriptions->where('user_id', auth()->user()->id);

                if ($subscriptions->isNotEmpty()) {
                    $subscription = $subscriptions->first();
                    $currentDateTime = Carbon::now();
                    $expirationDateTime = Carbon::parse($subscription->expiration);

                    $timeLeftInHours = $currentDateTime->diffInHours($expirationDateTime);

                    $plan->isSubscribed = true;
                    $plan->timeLeftInHours = $timeLeftInHours;
                } else {
                    $plan->isSubscribed = false;
                    $plan->timeLeftInHours = 0;
                }

                unset($plan->subscriptions);
            });

            return response()->json([
                'error' => false,
                'message' => 'Success',
                'data' => $plans,
            ]);
    }

    public function index()
    {
        return view('Admin.Plan.index');
    }

    public function fetchplan(){
        $Channel=Plan::all();
        return DataTables::of($Channel)->make(true);
    }

    public function store(PlanDataTableEditor $editor)
    {
        return $editor->process(\request());
    }
}
