<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Mail;
use App\Mail\EnrollMail;

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

public function enroll($id)
{
    $course = Courses::findOrFail($id);

    // (Optional) Save enrollment
    Enrollment::firstOrCreate([
        'user_id' => auth()->id(),
        'course_id' => $course->id,
    ]);

    $data = [
        'name' => auth()->user()->name,
        'message' => 'You have successfully enrolled in ' . $course->title,
    ];

    Mail::to(auth()->user()->email)
        ->send(new EnrollMail($data));

    return redirect()->route('enrollment.success')
                     ->with('success', 'Enrolled successfully! Email sent.');
}


}
