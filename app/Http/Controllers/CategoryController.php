<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\DataTables\CategoryDataTableEditor;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only'=> ['getcategories']]);
    }
    public function getcategories(){
        $categories= Category::all();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $categories,
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
