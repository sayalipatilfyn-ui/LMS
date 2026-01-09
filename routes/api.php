<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourseApiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//

Route::get('/users', [CourseApiController::class, 'index']);
Route::post('/users', [CourseApiController::class, 'store']);



//courses api
Route::get('/courses', [CourseApiController::class, 'index']);
Route::get('/courses/{id}',[CourseApiController::class,'show']);
Route::post('courses-add',[CourseApiController::class,'store']);
Route::post('/register', [CourseApiController::class, 'createRegister']);


Route::post('/create',[CourseApiController::class,'createCourse']);

