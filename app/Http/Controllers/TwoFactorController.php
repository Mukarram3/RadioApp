<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
//use App\Mail\TwoFactorAuthMail;
use TwoFactorAuthMail;

class TwoFactorController extends Controller
{
    public function enableTwoFactorAuth(Request $request)
    {
        $user = $request->user();

        // Generate and store the secret key
        $secretKey = $user->enableTwoFactorAuth();

        // Generate and send the OTP via email
        $otp = $this->generateOTP();
        Mail::to($user->email)->send(new TwoFactorAuthMail($otp));

        return response()->json([
            'message' => 'Two-factor authentication enabled. OTP sent to your email.',
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $user = $request->user();
        $otp = $request->input('otp');

        // Retrieve the stored OTP from the user model
        $storedOtp = $user->otp;

        if ($otp == $storedOtp) {
            // OTP is valid, proceed with the desired action
            return response()->json([
                'message' => 'OTP verification successful.',
            ]);
        } else {
            // OTP is invalid
            return response()->json([
                'message' => 'Invalid OTP.',
            ], 401);
        }
    }

    private function generateOTP()
    {
        // Generate a random OTP
        return mt_rand(100000, 999999);
    }
}
