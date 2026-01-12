<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\CourseApiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//user api
Route::get('/users', [UserApiController::class, 'index']);
Route::get('/users/{id}', [UserApiController::class, 'show']);
Route::post('/users-add', [UserApiController::class, 'create']);
Route::put('/update-users/{id}', [UserApiController::class, 'updateUsers']);
Route::delete('/delete-course/{id}', [UserApiController::class, 'deleteUsers']);



//courses api
Route::get('/courses', [CourseApiController::class, 'index']);
Route::get('/courses/{id}',[CourseApiController::class,'show']);
Route::post('/create',[CourseApiController::class,'createCourse']);
Route::put('/update-courses/{id}',[CourseApiController::class,'updateCourse']);
Route::delete('/delete-course/{id}',[CourseApiController::class,'deleteCourse']);


