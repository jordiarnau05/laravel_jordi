<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

Route::get('/', [CourseController::class, 'index']);
Route::get('/courses/export', [CourseController::class, 'exportCsv'])->name('courses.export');
Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
=======

Route::get('/', function () {
    return view('welcome');
});
>>>>>>> 443143e82348b7c118ff286d421be07040884996
