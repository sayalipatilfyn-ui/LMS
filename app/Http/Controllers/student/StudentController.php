<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Progress;
use App\Models\Enrollment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

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

    public function update($id){
        $student = User::findOrFail($id);

        return view('student.edit', compact('student'));
    }

    public function studentUpdate(Request $request,$id){
        
        $student = User::findOrFail($id);

        $validate=$request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $student->id,
            'password' => 'nullable|min:6',
        ]);

        $student->update($validate);
        return redirect()->back()->with('success','Record updated successfully..');

    }

}
