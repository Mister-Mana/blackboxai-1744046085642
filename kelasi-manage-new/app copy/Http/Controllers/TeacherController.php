<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SchoolClass;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $classes = SchoolClass::where('teacher_id', auth()->id())->get();
        $students = User::where('role', User::ROLE_STUDENT)
                      ->whereHas('schoolClasses', function($query) {
                          $query->where('teacher_id', auth()->id());
                      })
                      ->count();

        return view('teacher.dashboard', compact('classes', 'students'));
    }

    public function myClasses()
    {
        $classes = SchoolClass::with('students')
                    ->where('teacher_id', auth()->id())
                    ->paginate(10);

        return view('teacher.classes', compact('classes'));
    }
}