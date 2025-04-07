<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SchoolClassController;

// Authentication Routes
Auth::routes();

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Super Admin Routes
Route::middleware(['auth', 'role:super_admin'])->prefix('super-admin')->name('super-admin.')->group(function () {
    // School Classes Management
    Route::prefix('classes')->name('classes.')->group(function () {
        Route::get('/', [SchoolClassController::class, 'index'])->name('index');
        Route::get('/create', [SchoolClassController::class, 'create'])->name('create');
        Route::post('/', [SchoolClassController::class, 'store'])->name('store');
        Route::get('/{class}/edit', [SchoolClassController::class, 'edit'])->name('edit');
        Route::put('/{class}', [SchoolClassController::class, 'update'])->name('update');
        Route::delete('/{class}', [SchoolClassController::class, 'destroy'])->name('destroy');
    });

    // Other super-admin routes can be added here
});

// Role-based Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'AdminController@dashboard');
    });

    Route::prefix('teacher')->group(function () {
        Route::get('/dashboard', 'TeacherController@dashboard');
    });

    Route::prefix('parent')->group(function () {
        Route::get('/dashboard', 'ParentController@dashboard');
    });

    Route::prefix('student')->group(function () {
        Route::get('/dashboard', 'StudentController@dashboard');
    });
});