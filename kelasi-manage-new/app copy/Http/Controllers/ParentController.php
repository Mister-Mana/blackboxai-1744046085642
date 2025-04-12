<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SchoolClass;

class ParentController extends Controller
{
    public function dashboard()
    {
        $children = auth()->user()->children()->with('schoolClasses')->get();
        return view('parent.dashboard', compact('children'));
    }

    public function children()
    {
        $children = auth()->user()->children()->with(['schoolClasses', 'grades'])->paginate(10);
        return view('parent.children', compact('children'));
    }
}