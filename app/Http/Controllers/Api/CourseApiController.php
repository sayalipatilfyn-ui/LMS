<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\CourseResource;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class CourseApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Courses::query();

        if ($request->search) {
            $query->where('title', 'LIKE', "%{$request->search}%");
        }

        if ($request->category && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        // return response()->json([
        //     'status' => true,
        //     'data' => $query->get()
        // ]);

        return CourseResource::collection(
            Courses::paginate(10)
        );


    }

    //show particular one courses
     public function show($id)
    {
        // $course = Courses::findOrFail($id);
        // return response()->json([
        //     'status'=>true,
        //     'data'=>$course
        // ]);


        $course = Courses::findOrFail($id);

        return new CourseResource($course);
    }

    public function createCourse(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'category'    => 'required|string|min:3',
            'price'       => 'required|numeric|min:0',
        ]);

        $course = Courses::create($validated);

        return response()->json([
            'status' => true,
            'msg'    => 'Course created successfully',
            'data'   => $course,
        ], 201);
    }

    public function updateCourse(Request $request,$id)
    
    {
        $course = Courses::findOrFail($id);
        $val = $request->validate([
            'title' => 'sometimes|required|string|min:5',
            'description' => 'sometimes|required|string|min:10',
            'category' => 'sometimes|required|string|min:3',
            'price' => 'sometimes|required|numeric|min:0',
        ]);
        $course->update($val);
        return response()->json([ 
            'status' => true,
            'msg' => 'Course updated successfully',
            'data' => $course,
        ]);
    }

    public function deleteCourse($id)
    {
        $course = Courses::findOrFail($id);
        $course->delete();
        return response()->json([
            'status' => true,
            'msg' => 'Course deleted successfully',
        ]);
    }
}