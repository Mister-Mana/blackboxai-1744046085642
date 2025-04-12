@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">My Grades</h1>
    
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Assignment</th>
                    <th class="px-4 py-2 text-left">Class</th>
                    <th class="px-4 py-2 text-left">Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $grade->assignment->title }}</td>
                    <td class="px-4 py-3">{{ $grade->assignment->class->name }}</td>
                    <td class="px-4 py-3">{{ $grade->score }}/{{ $grade->assignment->max_score }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $grades->links() }}
    </div>
</div>
@endsection