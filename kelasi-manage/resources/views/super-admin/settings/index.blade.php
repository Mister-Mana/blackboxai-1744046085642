@extends('layouts.app')

@section('title', __('Settings'))

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">{{ __('Application Settings') }}</h2>

            <form method="POST" action="{{ route('settings.update') }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Application Name -->
                    <div class="col-span-1">
                        <label for="app_name" class="block text-gray-700 dark:text-gray-300 mb-2">{{ __('Application Name') }}</label>
                        <input id="app_name" type="text" name="app_name" value="{{ old('app_name', $settings['app_name'] ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                               required>
                        @error('app_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Default Language -->
                    <div class="col-span-1">
                        <label for="app_locale" class="block text-gray-700 dark:text-gray-300 mb-2">{{ __('Default Language') }}</label>
                        <select id="app_locale" name="app_locale"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                required>
                            @foreach(['en' => 'English', 'fr' => 'Français', 'ln' => 'Lingala', 'sw' => 'Swahili', 'tsh' => 'Tshiluba', 'kg' => 'Kikongo'] as $code => $name)
                                <option value="{{ $code }}" {{ (old('app_locale', $settings['app_locale'] ?? '') == $code) ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('app_locale')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Timezone -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="app_timezone" class="block text-gray-700 dark:text-gray-300 mb-2">{{ __('Timezone') }}</label>
                        <select id="app_timezone" name="app_timezone"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                required>
                            @foreach(timezone_identifiers_list() as $timezone)
                                <option value="{{ $timezone }}" {{ (old('app_timezone', $settings['app_timezone'] ?? '') == $timezone) ? 'selected' : '' }}>
                                    {{ $timezone }}
                                </option>
                            @endforeach
                        </select>
                        @error('app_timezone')
                            <p
