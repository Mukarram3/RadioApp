<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\deletepincode;
use App\Mail\verifyemail;
use App\Models\sendcode;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PragmaRX\Google2FA\Google2FA;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use URL;

class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('CheckExpiredToken', ['except' => ['login','signup','socialite']]);
    }

    public function signup(Request $request){
        $table= User::where('email', $request->email)->first();
        if($table){
                return response()->json(['error' => true, 'message' => 'Username or Email already exist']);
        }
        else{
            $data=array();
            $data["fname"]=$request->fname;
            $data["lname"]=$request->lname;
            $data["email"]=$request->email;
            $data["phone"]=$request->phone;
            $data["gender"]=$request->gender;
            $data["type"]=$request->type;
            $data["password"]=Hash::make($request->password);

            DB::table('users')->insert($data);
            return $this->login($request);
        }
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if ( !$token = JWTAuth::attempt($credentials)){
            return response()->json(['error' => true, 'message' => 'Unauthorized'], 401);
        }

        return $this->validatetoken($token);

    }

    protected function respondWithToken($token)
    {
        $expirytime= Carbon::now()->addMinutes(1)->getTimestamp();
        return response()->json([
            'error' => false,
            'message' => 'success',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expirytime,
            'authuser' => auth()->user()
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        return response()->json([
            'error' => false,
            'message' => 'User Profile',
            'user' => auth()->user(),
            ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['error' => false, 'message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function validatetoken($token){
        try{
            if (auth()->check()){
                return $this->respondWithToken($token);
            }
            else{
                return $this->refresh();
            }

        } catch (TokenExpiredException $e){
            return response()->json(['Page must be refreshed']);
        }

    }

    public function socialite(Request $request){
        try {

                if ($request->apple_id){
                    $searchUser = User::where('github_id', $request->github_id)->first();
                }
                if ($request->google_id){
                    $searchUser = User::where('google_id', $request->google_id)->first();
                }
                if ($request->fb_id){
                    $searchUser = User::where('fb_id', $request->fb_id)->first();
                }

                if($searchUser){

                    $token = JWTAuth::fromUser($searchUser);
                    Auth::login($searchUser);
                    $expirytime= Carbon::now()->addMinutes(1)->getTimestamp();
                    return response()->json([
                        'error' => false,
                        'message' => 'success',
                        'access_token' => $token,
                        'token_type' => 'bearer',
                        'expires_in' => $expirytime,
                        'authuser' => auth()->user()
                    ]);

                }
                else{
                    if ($request->google_id){
                        $User = User::create([
                            'email' => $request->email,
                            'google_id'=> $request->google_id,
                            'type'=> 'student',
                            'password' => Hash::make('gitpwd059')
                        ]);
                    }

                    if ($request->github_id){
                        $User = User::create([
                            'email' => $request->email,
                            'github_id'=> $request->github_id,
                            'type'=> 'student',
                            'password' => Hash::make('gitpwd059')
                        ]);
                    }

                    if ($request->fb_id){
                        $User = User::create([
                            'email' => $request->email,
                            'fb_id'=> $request->fb_id,
                            'type'=> 'student',
                            'password' => Hash::make('gitpwd059')
                        ]);
                    }

                    Auth::login($User);
                    $token = JWTAuth::fromUser($User);
                    $expirytime= Carbon::now()->addMinutes(1)->getTimestamp();
                    return response()->json([
                        'error' => false,
                        'message' => 'success',
                        'access_token' => $token,
                        'token_type' => 'bearer',
                        'expires_in' => $expirytime,
                        'authuser' => auth()->user()
                    ]);

                }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updateuser(Request $request){

        try {

            if($request->hasFile('image')){
                $image=$request->file('image');
                $path = 'public/editor/';
                    $extension=$image->getClientOriginalExtension();
                    $image_name=uniqid().".".$extension;
                    $image->storeAs($path,$image_name);

                    User::find(auth()->user()->id)->update([
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'gender' => $request->gender,
                        'image' => URL::to('/').'/storage/editor/'.$image_name,
                        'type' => $request->type,
                        'password' => Hash::make($request->password),
                    ]);
            }
            else{
                User::find(auth()->user()->id)->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'gender' => $request->gender,
                    'type' => $request->type,
                    'password' => Hash::make($request->password),
                ]);
            }

            return response()->json([
                'error' => false,
                'message' => 'User Updated Syccessfully',
            ]);

        }
        catch (Exception $exception){
            return response()->json($exception->getMessage());
        }

    }

}
