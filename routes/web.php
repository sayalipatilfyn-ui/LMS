<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
//Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'add'])->name('contact.add');

// Route::get('/courses', function () {
//     return view('courses');
// })->name('courses');


Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/enroll/{id}', [CourseController::class, 'enroll'])
    ->middleware('auth')
    ->name('enroll');

Route::get('/enrollment-success', function () {
    return view('enrollment-success');
})->name('enrollment.success');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('courses', CourseController::class);
});


Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.submit');
