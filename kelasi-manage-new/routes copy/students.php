<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::prefix('student')->middleware(['auth', 'student'])->group(function() {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/grades', [StudentController::class, 'grades'])->name('student.grades');
});