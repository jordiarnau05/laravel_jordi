<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

Route::get('/', [CourseController::class, 'index']);
Route::get('/courses/export', [CourseController::class, 'exportCsv'])->name('courses.export');
Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
