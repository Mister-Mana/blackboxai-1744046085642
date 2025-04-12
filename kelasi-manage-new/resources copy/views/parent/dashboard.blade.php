@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-6">Parent Dashboard</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <h3 class="font-bold text-blue-800">Children</h3>
                        <p class="text-3xl">{{ $children->count() }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg">
                        <h3 class="font-bold text-green-800">Classes</h3>
                        <p class="text-3xl">{{ $children->pluck('schoolClasses')->flatten()->unique('id')->count() }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('parent.children') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                        View My Children
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection