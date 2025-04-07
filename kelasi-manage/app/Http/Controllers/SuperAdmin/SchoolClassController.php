<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::with('school')->paginate(10);
        return view('super-admin.classes.index', compact('classes'));
    }

    public function create()
    {
        $schools = School::all();
        return view('super-admin.classes.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'name' => 'required|string|max:255',
            'section' => 'nullable|string|max:50',
            'capacity' => 'nullable|integer|min:1'
        ]);

        SchoolClass::create($validated);

        return redirect()->route('super-admin.classes.index')
            ->with('success', 'Class created successfully');
    }

    public function edit(SchoolClass $class)
    {
        $schools = School::all();
        return view('super-admin.classes.edit', compact('class', 'schools'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $validated = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'name' => 'required|string|max:255',
            'section' => 'nullable|string|max:50',
            'capacity' => 'nullable|integer|min:1'
        ]);

        $class->update($validated);

        return redirect()->route('super-admin.classes.index')
            ->with('success', 'Class updated successfully');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();
        return redirect()->route('super-admin.classes.index')
            ->with('success', 'Class deleted successfully');
    }
}