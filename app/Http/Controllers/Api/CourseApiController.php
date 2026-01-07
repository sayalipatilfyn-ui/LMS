<?php

namespace App\Http\Controllers\Api;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return response()->json([
            'status' => true,
            'data' => $query->get()
        ]);
    }

    //show particular one courses
     public function show($id)
    {
        $course = Courses::findOrFail($id);
        return response()->json([
            'status'=>true,
            'data'=>$course
        ]);
    }


   public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|min:5',
        'description' => 'required|min:10',
        'category'    => 'required|min:5',
        'price'       => 'required|numeric'
    ]);

    $course = Courses::create($validated);

    return response()->json([
        'status' => true,
        'msg'    => 'Record added successfully',
        'data'   => $course
    ], 201);
}
}
