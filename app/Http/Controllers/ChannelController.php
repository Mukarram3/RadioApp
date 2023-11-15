<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Channel;
use App\Models\Plan;
use App\Models\Song;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only' => ['getchannels', 'storeChannel']]);
    }
    public function getchannels()
    {
        $userId = auth()->user()->id;

        $channels = Channel::where('status', true)->get();

        $channels->each(function ($channel) use ($userId) {
            $isSubscribed = false;

            if ($channel->plans) {
                $plan_id = $channel->plans->id;

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


    public function getchannelsongs(Request $request){
        $Song= Song::where('channel_id', $request->channel_id)
        ->select('*')
        ->select(array_diff(Schema::getColumnListing('songs'), ['category_id']))
        ->get();

        return response()->json([
            'error' => false,
            'message' => 'Success',
            'artist_songs' => $Song,
        ]);
    }

    public function index()
    {
        return view('Admin.Channel.index');
    }

    public function getChannelsList(Request $request)
    {
        $Channel = Channel::with('plans')->get();
        return DataTables::of($Channel)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                <a class="btn btn-sm btn-primary" href="' . route("get.Channel.details", $row['id']) . '" data-id="' . $row['id'] . '">Update</a>
                <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteCountryBtn">Delete</button>
            </div>';
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="country_checkbox" data-id="' . $row['id'] . '"><label></label>';
            })
            ->rawColumns(['actions', 'checkbox'])
            ->make(true);
    }

    public function create()
    {
        $artists = Artist::all();
        $Plans = Plan::all();
        return view('Admin.Channel.create', compact('artists', 'Plans'));
    }

    public function store(Request $request)
    {

        $channel = new Channel();
        $channel->title = $request->title;
        $channel->status = $request->status;
        $channel->type = $request->type;
        $channel->plan_id = $request->plan;

        $file = $request->image;
        $picture = $file;
        if (!empty($picture)) {
            $fImage = json_decode($picture);
        }
        $currentDate = Carbon::now()->toDateString();
        $imageProfile = 'profile-' . $currentDate . '-' . uniqid() . '.png';

        if (!Storage::disk('public')->exists('editor')) {
            Storage::disk('public')->makeDirectory('editor');
        }
        $fStream = Image::make($fImage->data)->encode('png', 65)->stream();
        Storage::disk('public')->put('editor/' . $imageProfile, $fStream);
        $filename = 'editor/' . $imageProfile;
        $channel['image'] = $filename;
        $channel->save();

        return redirect()->route('channelsindex')->with(['success' => 'Channel saved successfully.']);
    }

    public function destroy(Request $request)
    {
        $channel_id = $request->channel_id;
        $data = Channel::find($channel_id);
        $query = $data->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'This Channel has been Deleted from database']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        }
    }

    public function deleteSelectedchannels(Request $request)
    {
        $product_ids = $request->countries_ids;
        $Channels = Channel::whereIn('id', $product_ids)->get();
        foreach ($Channels as $Channel) {
            $Channel->delete();
        }
        return response()->json(['code' => 1, 'msg' => 'These Channels have been Deleted from database']);
    }

    public function edit($id)
    {
        $channel_id = $id;
        $channelDetails = Channel::where('id', $channel_id)->with('plans')->first();
        $Plans = Plan::all();
        return view('Admin.Channel.edit', compact('Plans', 'channelDetails'));

    }

    public function update(Request $request)
    {

        $channelid = $request->channel_id;
        $validator = Validator::make($request->all(), [
            // 'title' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $channel = Channel::find($channelid);

            $channel->title = $request->title;
            $channel->status = $request->status;
            $channel->type = $request->type;
            $channel->plan_id = $request->plan;

            $file = $request->image;
            $picture = $file;
            if (!empty($picture)) {
                $fImage = json_decode($picture);
            }
            $currentDate = Carbon::now()->toDateString();
            $imageProfile = 'profile-' . $currentDate . '-' . uniqid() . '.png';

            if (!Storage::disk('public')->exists('editor')) {
                Storage::disk('public')->makeDirectory('editor');
            }
            $fStream = Image::make($fImage->data)->encode('png', 65)->stream();
            Storage::disk('public')->put('editor/' . $imageProfile, $fStream);
            $filename = 'editor/' . $imageProfile;
            $channel['image'] = $filename;

            $query = $channel->update();

            return redirect()->route('channelsindex');
        }

    }

    public function storeChannel(Request $request)
    {
        try {
            $channel = new Channel();
            $channel->title = $request->title;
            $channel->plan_id = $request->plan_id;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = 'storage/editor/';
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
