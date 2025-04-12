<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        $teachers = User::where('role', User::ROLE_TEACHER)->count();
        $students = User::where('role', User::ROLE_STUDENT)->count();
        $parents = User::where('role', User::ROLE_PARENT)->count();

        return view('admin.dashboard', compact('users', 'teachers', 'students', 'parents'));
    }

    public function manageUsers()
    {
        $users = User::with('school')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
}