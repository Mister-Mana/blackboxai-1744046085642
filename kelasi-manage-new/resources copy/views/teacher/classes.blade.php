@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-6">My Classes</h1>
                
                <div class="space-y-4">
                    @foreach($classes as $class)
                    <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg text-indigo-600">{{ $class->name }}</h3>
                                <p class="text-gray-600 mt-1">{{ $class->description }}</p>
                            </div>
                            <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">
                                {{ $class->students->count() }} students
                            </span>
                        </div>
                        
                        <div class="mt-3">
                            <h4 class="font-medium text-gray-700 mb-2">Students</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                @foreach($class->students as $student)
                                <div class="flex items-center space-x-2">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-xs font-medium">{{ initials($student->name) }}</span>
                                    </div>
                                    <span>{{ $student->name }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $classes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection