<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ScheduleArtist extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['only'=> ['scheduleartists','del_artist']]);
    }

    public function scheduleartists(Request $request){
        $scheduleartists= \App\Models\Scheduleartist::where('date','LIKE',"%$request->date%")->with('artist')->get();
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $scheduleartists,
        ]);
    }

    public function del_artist(Request $request){

        try{
            // \App\Models\ScheduleArtist::whereIn('id', $request->id)->delete();
            $Scheduleartists=\App\Models\Scheduleartist::whereIn('id', $request->id)->delete();
        return response()->json([
            'error' => false,
            'message' => 'Success',
        ]);
    }
    catch(Exception $e){
        return response()->json([
            'error'=> true,
            'message'=> $e->getMessage(),
            ]);
        }

    }

    public function indexajax()
    {

        return view('Admin.ScheduleArtist.index');
    }


    public function getSongsList(Request $request)
    {
        $Scheduleartist = \App\Models\Scheduleartist::with('artist')->get();
        // return $Product;
        return DataTables::of($Scheduleartist)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                <a class="btn btn-sm btn-primary" href="' . route("get.ScheduleArtist.details", $row['id']) . '" data-id="' . $row['id'] . '">Update</a>
                <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteCountryBtn">UnSchedule</button>
            </div>';
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="country_checkbox" data-id="' . $row['id'] . '"><label></label>';
            })
            ->rawColumns(['actions', 'checkbox'])
            ->make(true);
    }

    public function create(){
        $Artists= Artist::all();
        return view('Admin.ScheduleArtist.create', compact('Artists'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $date = $request->input('date');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        $carbonDate = Carbon::parse($date);
        $formattedDate = $carbonDate->format('j M D');

        $carbonstartTime = Carbon::parse($start_time);
        $formattedstartTime = $carbonstartTime->format('h:ia');

        $carbonendTime = Carbon::parse($end_time);
        $formattedendTime = $carbonendTime->format('h:ia');

        $scheduleArtist= new \App\Models\Scheduleartist();
        $scheduleArtist->artist_id= $request->artist_id;
        $scheduleArtist->date= $formattedDate;
        $scheduleArtist->start_time= $formattedstartTime;
        $scheduleArtist->end_time= $formattedendTime;

        $scheduleArtist->save();

        return redirect()->route('scheduleartists')->with(['success' =>'Schedule saved successfully.']);
    }


    public function destroy(Request $request)
    {
        $productid = $request->country_id;
        $data = \App\Models\Scheduleartist::find($productid);
        // $data->status= 'inactive';
        $query=$data->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'This Artist has been Unschedule from database']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        }
    }

    public function deleteSelectedScheduleArtist(Request $request)
    {
        $product_ids = $request->countries_ids;
        $Scheduleartists=\App\Models\Scheduleartist::whereIn('id', $product_ids)->get();
        foreach($Scheduleartists as $Scheduleartist){
            $Scheduleartist->delete();
        }
        return response()->json(['code' => 1, 'msg' => 'These Artists have been Unschedule from database']);
    }

    public function edit($id)
    {
        $scheduleartist_id = $id;
        $scheduleartistDetails = \App\Models\Scheduleartist::where('id', $scheduleartist_id)->with('artist')->first();

        $artists= Artist::all();
        return view('Admin.ScheduleArtist.edit',compact('scheduleartistDetails','artists'));

    }

    public function update(Request $request)
    {

        $songid = $request->songid;
        $validator = Validator::make($request->all(), [
            // 'title' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $scheduleArtist = \App\Models\Scheduleartist::find($songid);

            $scheduleArtist->artist_id= $request->artist_id;
            $scheduleArtist->date= $request->date;
            $scheduleArtist->start_time= $request->start_time;
            $scheduleArtist->end_time= $request->end_time;

            $query = $scheduleArtist->update();

            return redirect()->route('scheduleartists');
        }

    }

}
