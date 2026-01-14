<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
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
