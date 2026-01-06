<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Show register form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        // 1️⃣ Validate input
        $request->validate([
            'name'                  => 'required|string|min:2|max:100',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|confirmed',
        ]);

        // 2️⃣ Create user (bcrypt password)
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3️⃣ Login user automatically
        Auth::login($user);

        // 4️⃣ Regenerate session (security)
        $request->session()->regenerate();

        /**
         * 🔥 IMPORTANT:
         * Redirect to intended URL
         * (Enroll → Register → Enroll works)
         */
        return redirect()->intended(route('courses'));
    }
}
