<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdmin\SchoolClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users');
});

// Teacher Routes
Route::prefix('teacher')->middleware(['auth', 'teacher'])->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/classes', [TeacherController::class, 'myClasses'])->name('teacher.classes');
});

// Parent Routes
Route::prefix('parent')->middleware(['auth', 'parent'])->group(function () {
    Route::get('/dashboard', [ParentController::class, 'dashboard'])->name('parent.dashboard');
    Route::get('/children', [ParentController::class, 'children'])->name('parent.children');
});

// Authentication Routes
Auth::routes();

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Language Switching Route
Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr', 'ln', 'sw', 'tsh', 'kg'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('language.switch');

// Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
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

    // Settings Management
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
});

// Include student routes
require __DIR__.'/students.php';

// Role-based Dashboard Routes (simplifiées)
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
});
