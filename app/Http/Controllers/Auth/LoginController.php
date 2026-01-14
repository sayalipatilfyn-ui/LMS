<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $user=Cache::remember('users-login-cache', now()->addMinutes(10), function () {
            return User::all();
        });
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        //Attempt login (email + password ONLY)
        if (Auth::attempt(
            $request->only('email', 'password'),
            $request->filled('remember')
        )) {
            //Regenerate session (security)
            $request->session()->regenerate();

            //Role-based redirect
            $user = Auth::user();
            $user->createToken('login-token')->plainTextToken;

            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            // if ($user->role === 'instructor') {
            //     return redirect()->intended(route('instructor.dashboard'));
            // }

            //Default → Student
            return redirect()->intended(route('student.dashboard'));
            
        }

        //Login failed
        return back()->with('error', 'Invalid email or password');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Logged out successfully');
    }
}

