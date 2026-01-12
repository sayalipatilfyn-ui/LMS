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

       public function updateUsers(Request $request, $id){
                $user = User::find($id);
                $validate = $request->validate([
                    'name' => 'required|string|min:3',
                    'email' => 'required|email|unique:users,email,'.$user->id,
                    'password' => 'nullable|min:6',
                    'role' => 'required|string'
                ]);
                $requestData = [
                    'name' => $validate['name'],
                    'email' => $validate['email'],
                    'role' => $validate['role']
                ];
                if(!empty($validate['password'])){
                    $requestData['password'] = Hash::make($validate['password']);
                }
                $user->update($requestData);
                return response()->json([
                    'status' => true,
                    'msg' => 'User updated successfully',  
                    'data' => $user,
                    ]);
       }

    public function deleteUsers($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'status' => true,
            'msg' => 'User deleted successfully',
        ]);


}
