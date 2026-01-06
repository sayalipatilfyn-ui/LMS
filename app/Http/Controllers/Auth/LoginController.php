<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        // 1️⃣ Validate request
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // 2️⃣ Fetch user manually (safe bcrypt check)
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Invalid email or password');
        }

        // 3️⃣ Verify password (bcrypt safe)
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid email or password');
        }

        // 4️⃣ Login user manually
        Auth::login($user, $request->filled('remember'));

        // 5️⃣ Regenerate session
        $request->session()->regenerate();

        /**
         * 🔥 IMPORTANT:
         * Redirects user back to:
         * - enroll page (if came from enroll)
         * - otherwise courses page
         */
        return redirect()->route('enrollment-success');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Logged out successfully');
    }
}
