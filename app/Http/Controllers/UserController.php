<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

//     function __construct()

//     {

//         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);

//         $this->middleware('permission:user-create', ['only' => ['create','store']]);

//         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);

// //        $this->middleware('permission:user-delete', ['only' => ['destroy']]);

//     }

    public function index(Request $request)

    {

        $data = User::orderBy('id','DESC')->get();

        return view('Admin.User.index',compact('data'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::pluck('name','name')->all();

        return view('Admin.User.create',compact('roles'));

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'fname' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|same:confirm-password',

            'roles' => 'required'

        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $path = 'public/editor/';
            $extension = $image->getClientOriginalExtension();
            $image_name = uniqid() . "." . $extension;
            $image->storeAs($path, $image_name);
            $input['image'] = $image_name;

        }

        $user = User::create($input);

        $user->assignRole($request->input('roles'));


        return redirect()->route('Users.index')->with('success','User created successfully');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $user = User::find($id);

        return view('Admin.User.show',compact('user'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $user = User::find($id);

        $roles = Role::pluck('name','name')->all();

        $userRole = $user->roles->pluck('name','name')->all();



        return view('Admin.User.edit',compact('user','roles','userRole'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'fname' => 'required',

            'email' => 'required|email|unique:users,email,'.$id,

            'password' => 'same:confirm-password',

            'roles' => 'required'

        ]);



        $input = $request->all();

        if(!empty($input['password'])){

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = Arr::except($input,array('password'));

        }

        $user = User::find($id);

        if($request->hasFile('image')){
            $image=$request->file('image');
                $path = 'public/editor/';
                $extension=$image->getClientOriginalExtension();
                $image_name=uniqid().".".$extension;
                $image->storeAs($path,$image_name);
                $input['image'] = $image_name;
        }



        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));



        return redirect()->route('Users.index')

            ->with('success','User updated successfully');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::find($id)->delete();

        return redirect()->route('Users.index')

            ->with('success','User deleted successfully');

    }
}
