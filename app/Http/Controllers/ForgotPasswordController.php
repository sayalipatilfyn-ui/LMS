<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // STEP 4: Show OTP page
    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    // STEP 4: Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required'
        ]);

        $record = DB::table('password_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if (!$record) {
            return back()->withErrors([
                'otp' => 'Invalid or expired OTP'
            ]);
        }

        return redirect('/reset-password')
            ->with('email', $request->email);
    }

    // STEP 5: Show reset password page
    public function showResetForm()
    {
        return view('resetpassword');
    }

    // ✅ STEP 5: RESET PASSWORD (THIS IS THE LAST CODE)
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        User::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        DB::table('password_otps')
            ->where('email', $request->email)
            ->delete();

        return redirect('/login')
            ->with('success', 'Password reset successfully');
    }
    // STEP 1: Show forgot password form
public function showEmailForm()
{
    return view('auth.forgot-password');
}

// STEP 2: Send OTP
public function sendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email'
    ]);

    $otp = rand(100000, 999999);

    DB::table('password_otps')->updateOrInsert(
        ['email' => $request->email],
        [
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]
    );

    // (Later you can add mail logic)

    return redirect('/verify-otp')->with('email', $request->email);
}

}
