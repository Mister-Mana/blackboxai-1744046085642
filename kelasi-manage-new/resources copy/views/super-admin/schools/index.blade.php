@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Gestion des Écoles</h1>
    
    <div class="mb-4">
        <a href="{{ route('schools.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i>Ajouter une école
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Téléphone</th>
                    <th class="py-3 px-6 text-left">Statut</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schools as $school)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-4 px-6">{{ $school->name }}</td>
                    <td class="py-4 px-6">{{ $school->email }}</td>
                    <td class="py-4 px-6">{{ $school->phone }}</td>
                    <td class="py-4 px-6">
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $school->status === 'active' ? 'bg-green-100 text-green-800' : 
                               ($school->status === 'inactive' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ $school->status }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{ route('schools.edit', $school) }}" class="text-blue-500 hover:text-blue-700 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('schools.destroy', $school) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection