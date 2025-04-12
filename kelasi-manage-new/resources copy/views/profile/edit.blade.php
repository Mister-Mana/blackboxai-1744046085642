@extends('layouts.app')

@section('title', __('Edit Profile'))

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">{{ __('Edit Profile') }}</h2>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Avatar Upload -->
                    <div class="col-span-1">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2">{{ __('Profile Picture') }}</label>
                        <div class="flex items-center space-x-4">
                            <img class="h-20 w-20 rounded-full object-cover" 
                                 src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('images/default-avatar.png') }}" 
                                 alt="{{ $user->name }}">
                            <div>
                                <input type="file" name="avatar" id="avatar" 
                                       class="block w-full text-sm text-gray-500
                                              file:mr-4 file:py-2 file:px-4
                                              file:rounded-md file:border-0
                                              file:text-sm file:font-semibold
                                              file:bg-blue-50 file:text-blue-700
                                              hover:file:bg-blue-100">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ __('Max size: 2MB') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Name Field -->
                    <div class="col-span-1">
                        <label for="name" class="block text-gray-700 dark:text-gray-300 mb-2">{{ __('Name') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                               required autocomplete="name">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="email" class="block text-gray-700 dark:text-gray-300 mb-2">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                               required autocomplete="email">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('profile.show') }}" 
                       class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Save Changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection