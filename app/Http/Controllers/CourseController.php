<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\Courses;
use App\Mail\EnrollMail;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CourseController extends Controller
{
    

        public function index(Request $request)
        {
            //Create unique cache key based on filters
            $cacheKey = 'courses_'
                . md5(
                    ($request->search ?? 'no-search') . '_'
                    . ($request->category ?? 'all')
                );

            //Cache query result
            $courses = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($request) {

                $query = Courses::query();

                // Search
                if ($request->filled('search')) {
                    $query->where('title', 'LIKE', '%' . $request->search . '%');
                }

                // Category Filter
                if ($request->filled('category') && $request->category !== 'all') {
                    $query->where('category', $request->category);
                }

                return $query->latest()->get();
            });

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
