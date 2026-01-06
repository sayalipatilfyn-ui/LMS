<?php

namespace App\Http\Controllers\Api;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
