@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Class: {{ $class->name }}</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('super-admin.classes.update', $class->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="school_id" class="block text-gray-700 text-sm font-bold mb-2">School</label>
                <select name="school_id" id="school_id" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('school_id') border-red-500 @enderror" required>
                    <option value="">Select School</option>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ $class->school_id == $school->id ? 'selected' : '' }}>
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
                @error('school_id')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Class Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $class->name) }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="section" class="block text-gray-700 text-sm font-bold mb-2">Section (Optional)</label>
                <input type="text" name="section" id="section" value="{{ old('section', $class->section) }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacity (Optional)</label>
                <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $class->capacity) }}" min="1"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('super-admin.classes.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Class
                </button>
            </div>
        </form>
    </div>
</div>
@endsection