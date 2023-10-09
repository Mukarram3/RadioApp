<?php

namespace App\Http\Controllers;

use App\DataTables\ChannelDataTableEditor;
use App\Models\Channel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChannelController extends Controller
{
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
}
