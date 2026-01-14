<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\AuthController;

// Rutes públiques - Autenticació
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutes protegides - Requereixen autenticació
Route::middleware('auth:sanctum')->group(function() {
    // Perfil i logout
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // API Resources protegits
    Route::apiResource('students', StudentController::class);
    Route::apiResource('courses', CourseController::class);
});
    
