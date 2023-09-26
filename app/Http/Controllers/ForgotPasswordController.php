<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        return $response === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Reset link sent to your email'], 200)
            : response()->json(['error' => 'Unable to send reset link'], 422);
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }
}
