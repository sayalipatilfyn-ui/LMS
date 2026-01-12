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

     public function NewCourses(){
        return view('admin.NewCourses');
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'category'    => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
        ]);

        Courses::create($request->all());

        return redirect()->back()
            ->with('success', 'Course added successfully!');
    }
}