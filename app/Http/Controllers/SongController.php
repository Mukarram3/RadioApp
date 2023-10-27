<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Channel;
use App\Models\Plan;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only'=> ['index','getcategorysongs']]);
    }
    public function index(){
        $Song= Song::with(['favsongs' => function ($query) {
            $query->where('user_id', auth()->user()->id);
        }])
        ->get();

        $Song->each(function ($song) {
            $song->isFavourite = $song->favsongs !== null && $song->favsongs->count() > 0;
            unset($song->favsongs);
        });
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $Song,
        ]);
    }

    public function getcategorysongs(Request $request){
        $Song= Song::where('category_id', $request->category_id)
        ->with(['favsongs' => function ($query) {
            $query->where('user_id', auth()->user()->id);
        }])
        ->get();

        $Song->each(function ($song) {
            $song->isFavourite = $song->favsongs !== null && $song->favsongs->count() > 0;
            unset($song->favsongs);
        });
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $Song,
        ]);
    }


    public function indexajax()
    {
        $categories = Category::all();

        $Song = Song::all();

        return view('Admin.Song.index', compact('Song'));
    }


    public function getSongsList(Request $request)
    {
        $Product = Song::with('hascategory', 'hasartist','haschannel','hasplan')->get();
//        return  $Product[1]->hasimage[0]->image;
        return DataTables::of($Product)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                <a class="btn btn-sm btn-primary" href="' . route("get.song.details", $row['id']) . '" data-id="' . $row['id'] . '">Update</a>
                <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteCountryBtn">Delete</button>
            </div>';
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="country_checkbox" data-id="' . $row['id'] . '"><label></label>';
            })
            ->rawColumns(['actions', 'checkbox'])
            ->make(true);
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $Song = new Song();
            $Song->title = $request->title;
            if($request->category_id){
                $Song->category_id = $request->category_id;
            }
            if($request->artist_id){
                $Song->artist_id = $request->artist_id;
            }
            if($request->channel_id){
                $Song->channel_id = $request->channel_id;
            }
            if($request->plan_id){
                $Song->plan_id = $request->plan_id;
            }
            $Song->type = $request->type;
            $Song->stream_type = $request->stream_type;
            $Song->stream_url = $request->stream_url;

            $query = $Song->save();

            return redirect()->route('songsindex');
        }
    }
    public function edit($id)
    {
        $song_id = $id;
        $songDetails = Song::where('id', $song_id)->with('hascategory', 'hasartist','haschannel','hasplan')->first();

        $artists= Artist::all();
        $channels= Channel::all();
        $categories= Category::all();
        $plans= Plan::all();

        return view('Admin.Song.edit',compact('songDetails','artists','channels','categories','plans'));

    }

    public function update(Request $request)
    {

        $songid = $request->songid;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $Song = Song::find($songid);
            $Song->title = $request->title;
            if($request->category_id){
                $Song->category_id = $request->category_id;
            }
            if($request->artist_id){
                $Song->artist_id = $request->artist_id;
            }
            if($request->channel_id){
                $Song->channel_id = $request->channel_id;
            }
            if($request->plan_id){
                $Song->plan_id = $request->plan_id;
            }
            $Song->type = $request->type;
            $Song->stream_type = $request->stream_type;
            $Song->stream_url = $request->stream_url;
            $query = $Song->update();

            return redirect()->route('songsindex');
        }

    }
    public function destroy(Request $request)
    {
        $productid = $request->country_id;
        $query = Song::find($productid)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Radio Statios or Live DJ has been deleted from database']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        }
    }

    public function deleteSelectedSongs(Request $request)
    {
        $product_ids = $request->countries_ids;
        Song::whereIn('id', $product_ids)->delete();
        return response()->json(['code' => 1, 'msg' => 'Radio Statios or Live DJ have been deleted from database']);
    }


}
