<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\student\StudentController;

//home page Navbar
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
 
//contact Page
Route::post('/contact', [ContactController::class, 'add'])->name('contact.add');

//for student courses 
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/enroll/{id}', [CourseController::class, 'enroll'])
    ->middleware('auth')
    ->name('enroll');

    ##############################
Route::get('/enrollment-success', function () {
    return view('enrollment-success');
})->name('enrollment.success');
###################################

//admin Dashboard
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');

    Route::get('/users', [AdminController::class, 'users'])
    ->name('admin.users');

        //*course Display
    Route::get('/coursesView', [AdminController::class, 'courses'])
    ->name('admin.coursesView');
    
    Route::get('/NewCourses',[AdminController::class,'NewCourses'])->name('courses.add');
    Route::post('/storeCourses',[AdminController::class,'storeCourse'])->name('admin.addCourses');
});



//student dashboard
Route::middleware(['auth'])->group(function(){
    Route::get('/stud-dashboard',[StudentController::class,'index'])
    ->name('student.dashboard');

    Route::get('/stud-edit/{id}',[StudentController::class,'update'])->name('student.edit');
    Route::post('studentUpdate/{id}',[StudentController::class,'studentUpdate'])->name('students.update');
});

//login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

//register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
->name('register.submit');





