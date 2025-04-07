@extends('layouts.app')

@section('title', __('Profile'))

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="flex items-center space-x-6">
                <div class="flex-shrink-0">
                    <img class="h-24 w-24 rounded-full object-cover" 
                         src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('images/default-avatar.png') }}" 
                         alt="{{ $user->name }}">
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $user->name }}</h2>
                    <p class="text-gray-600 dark:text-gray-300">{{ $user->email }}</p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-2">
                        {{ __('Member since') }} {{ $user->created_at->format('M Y') }}
                    </p>
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ route('profile.edit') }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                    {{ __('Edit Profile') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection