<?php

namespace App\Http\Controllers;

use App\DataTables\PlanDataTableEditor;
use App\Models\Plan;
use Yajra\DataTables\Facades\DataTables;

class PlanController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('CheckExpiredToken');
    // }
    public function getplans(){
        $Plan= Plan::all();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $Plan,
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
