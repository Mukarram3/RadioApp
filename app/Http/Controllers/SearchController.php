<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('CheckExpiredToken');
    }
    public function searchartist(Request $request)
    {
        $data= Artist::where('name','LIKE','%'.$request->name.'%')->get();
        if($data){
            return response()->json([
                'error' => false,
                'message' => 'Success',
                'data' => $data,
            ]);
        }
        else{
            return response()->json([
                'error' => false,
                'message' => 'No record found',
            ]);
        }
    }
}
