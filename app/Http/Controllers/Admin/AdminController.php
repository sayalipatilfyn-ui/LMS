<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.Admindashboard', [
            'userCount' => User::count(),
           'courseCount' =>Courses::count()
        ]);
    }

    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function courses(){
        $courses = Courses::latest()->get();
        return view('admin.courseView',compact('courses'));
    }
}