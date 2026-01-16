<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $user=Cache::remember('users-register-cache', now()->addMinutes(10), function () {
            return User::all();
        });

        return view('auth.register');
    }
    public function register(Request $request)
    {
        //Validate input
        $request->validate([
            'name'                  => 'required|string|min:2|max:100',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|confirmed',
        ]);

        //Create user (bcrypt password)
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Login user automatically
        Auth::login($user);

        $user->createToken('register-token')->plainTextToken;
        
        
        //Regenerate session (security)
        $request->session()->regenerate();
        return redirect()->intended(route('login'));
    }
}
