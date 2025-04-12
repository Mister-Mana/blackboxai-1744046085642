@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-6">My Children</h1>
                
                <div class="space-y-4">
                    @foreach($children as $child)
                    <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg">{{ $child->name }}</h3>
                                <p class="text-gray-600">{{ $child->email }}</p>
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                {{ $child->role }}
                            </span>
                        </div>
                        
                        <div class="mt-3">
                            <h4 class="font-medium text-gray-700 mb-2">Classes</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($child->schoolClasses as $class)
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                    {{ $class->name }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $children->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection