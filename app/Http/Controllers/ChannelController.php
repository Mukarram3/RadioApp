<?php

namespace App\Http\Controllers;

use App\DataTables\ChannelDataTableEditor;
use App\Models\Channel;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only'=> ['getchannels','storeChannel']]);
    }
    public function getchannels(){
        $Channel= Channel::all();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $Channel,
        ]);
    }

    public function index()
    {
        return view('Admin.Channel.index');
    }

    public function fetchchannel(){
        $Channel=Channel::all();
        return DataTables::of($Channel)->make(true);
    }

    public function store(ChannelDataTableEditor $editor)
    {
        return $editor->process(\request());
    }

    public function storeChannel(Request $request){
        try{
            $channel= new Channel();
            $channel->title= $request->title;
            $channel->artist_name= $request->artist_name;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $path = 'storage/images/';
                $extension=$image->getClientOriginalExtension();
                $image_name=uniqid().".".$extension;
                $image->storeAs($path,$image_name);
            }
            $channel->save();
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
}
