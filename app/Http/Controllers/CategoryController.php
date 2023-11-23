<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Song;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\DataTables\CategoryDataTableEditor;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only'=> ['getcategories','getcategorysongs']]);
    }
    public function getcategories(){
        $categories= Category::all();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $categories,
        ]);
    }

    public function getcategorysongs(Request $request){
        $Song= Song::where('category_id', $request->category_id)
        ->with(['favsongs' => function ($query) {
            $query->where('user_id', auth()->user()->id);
        }])
        ->select('*')
        ->select(array_diff(Schema::getColumnListing('songs'), ['channel_id','plan_id','type','ispodcast','istop20']))
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


    public function index()
    {
        return view('Admin.Category.index');
    }

    public function userindexpage(){
        $categories= Category::all();
        return view('User.categories',compact('categories'));
    }

    public function fetchcategory(){
        $Category=Category::all();
        return DataTables::of($Category)->make(true);
    }

    public function store(CategoryDataTableEditor $editor)
    {
        return $editor->process(\request());
    }

}
