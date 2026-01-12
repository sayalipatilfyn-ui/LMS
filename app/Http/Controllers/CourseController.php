<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     public function index(Request $request)
    {
        $query = Courses::query();

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        // Category Filter
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $courses = $query->latest()->get();

        return view('courses', compact('courses'));
    }

    //show particular one course
        public function show($id)
    {
        $course = Courses::findOrFail($id);
        return view('course-details', compact('course'));
    }

    // enroll any courses
        public function enroll(Request $request, $courseId)
    {
        Enrollment::create([
            'user_id'   => $request->user()->id,
            'course_id'=> $courseId
        ]);

        return redirect()->route('enrollment.success')->with('success', 'Enrolled successfully!');
    }

}
