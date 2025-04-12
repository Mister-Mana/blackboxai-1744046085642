@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <h3 class="font-bold text-blue-800">Total Users</h3>
                        <p class="text-3xl">{{ $users }}</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg">
                        <h3 class="font-bold text-green-800">Teachers</h3>
                        <p class="text-3xl">{{ $teachers }}</p>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded-lg">
                        <h3 class="font-bold text-yellow-800">Students</h3>
                        <p class="text-3xl">{{ $students }}</p>
                    </div>
                    <div class="bg-purple-100 p-4 rounded-lg">
                        <h3 class="font-bold text-purple-800">Parents</h3>
                        <p class="text-3xl">{{ $parents }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('admin.users') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Manage Users
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection