<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
use App\Models\Progress;

class StudentController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // All enrollments
        $enrollments = Enrollment::with('course')
            ->where('user_id', $userId)
            ->get();

        // Progress data
        $progress = Progress::where('user_id', $userId)->get();

        // Stats
        $totalCourses = $enrollments->count();

        $completed = Progress::where('user_id', $userId)
            ->where('percentage', 100)
            ->count();

        $inProgress = Progress::where('user_id', $userId)
            ->whereBetween('percentage', [1, 99])
            ->count();

        $notStarted = $totalCourses - ($completed + $inProgress);

        // ONLY IN-PROGRESS ENROLLED COURSES
        $inProgressCourses = Enrollment::with('course')
            ->where('user_id', $userId)
            ->whereIn('course_id', function ($q) use ($userId) {
                $q->select('course_id')
                  ->from('progress')
                  ->where('user_id', $userId)
                  ->whereBetween('percentage', [1, 99]);
            })
            ->get();

        return view('student.dashboard', compact(
            'totalCourses',
            'completed',
            'inProgress',
            'notStarted',
            'progress',
            'inProgressCourses'
        ));
    }
}
