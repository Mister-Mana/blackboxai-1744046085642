<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('super-admin.schools.index', compact('schools'));
    }

    public function create()
    {
        return view('super-admin.schools.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:schools',
            'phone' => 'required|string',
            'address' => 'required|string',
            'subscription_expiry' => 'required|date'
        ]);

        $validated['license_key'] = Str::uuid();
        $validated['status'] = 'active';

        School::create($validated);

        return redirect()->route('schools.index')
            ->with('success', 'École créée avec succès!');
    }

    public function show(School $school)
    {
        return view('super-admin.schools.show', compact('school'));
    }

    public function edit(School $school)
    {
        return view('super-admin.schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:schools,email,'.$school->id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'subscription_expiry' => 'required|date',
            'status' => 'required|in:active,inactive,suspended'
        ]);

        $school->update($validated);

        return redirect()->route('schools.index')
            ->with('success', 'École mise à jour avec succès!');
    }

    public function destroy(School $school)
    {
        $school->delete();
        return redirect()->route('schools.index')
            ->with('success', 'École supprimée avec succès!');
    }
}