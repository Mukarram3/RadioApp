<?php

namespace App\Http\Controllers;

use App\DataTables\ChannelDataTableEditor;
use App\Models\Channel;
use App\Models\Subscription;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only' => ['getchannels','storeChannel']]);
    }
    public function getchannels()
    {
        $userId = auth()->user()->id;

        $channels = Channel::all();

        $channels->each(function ($channel) use ($userId) {
            $isSubscribed = false;

            if ($channel->plans) {
                $plan_id= $channel->plans->id;

                $channel->plans->each(function ($plan) use ($userId, &$plan_id, &$isSubscribed) {

                    $plan->subscriptions->each(function ($subscribe) use ($userId, &$plan_id, &$isSubscribed) {

                        if ($subscribe->user_id == $userId && $subscribe->plan_id == $plan_id) {
                            $isSubscribed = true;
                        }
                    });
                });
            }

            $channel->isSubscribed = $isSubscribed;
        });

        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $channels,
        ]);
    }

    public function index()
    {
        return view('Admin.Channel.index');
    }

    public function fetchchannel()
    {
        $Channel = Channel::all();
        return DataTables::of($Channel)->make(true);
    }

    public function store(ChannelDataTableEditor $editor)
    {
        return $editor->process(\request());
    }

    public function storeChannel(Request $request)
    {
        try {
            $channel = new Channel();
            $channel->title = $request->title;
            $channel->artist_name = $request->artist_name;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = 'storage/images/';
                $extension = $image->getClientOriginalExtension();
                $image_name = uniqid() . "." . $extension;
                $image->storeAs($path, $image_name);
            }
            $channel->save();
            return response()->json([
                'error' => false,
                'message' => 'Success',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
