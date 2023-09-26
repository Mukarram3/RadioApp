<?php
namespace App\Http\Controllers\Api\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
class GoogleController extends Controller
{
    public function signInwithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackToGoogle()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/index');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'auth_type'=> 'google',
                    'password' => Hash::make('admin@123')
                ]);

                Auth::login($newUser);

                return redirect('/index');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
