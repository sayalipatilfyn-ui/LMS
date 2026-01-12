<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
   public function index(){
     return response()->json([
            'status' => true,
            'data' => User::all()
        ]);
   }
   
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'status'=>true,
            'data'=>$user
        ]);
    }

     public function create(Request $request)
{

     $validated = $request->validate([
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'     => 'required|string'
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
        ]);

        return response()->json([
            'status' => true,
            'msg'    => 'User created successfully',
            'data'   => $user
        ], 201);
}
}
