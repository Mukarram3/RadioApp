<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
//        return $request;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required|string',
        ]);

        $response = Password::reset($request->only(
            'email', 'password', 'password_confirmation', 'token'
        ), function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        return $response === Password::PASSWORD_RESET
            ? response()->json(['message' => 'Password has been reset'], 200)
            : response()->json(['error' => 'Unable to reset password'], 422);
    }

    public function showResetForm($token = null)
    {
        return view('auth.passwords.reset', ['token' => $token]);
//        return view('auth.passwords.reset', ['token' => $token]);
    }

}
