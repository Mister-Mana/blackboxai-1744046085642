@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Ajouter une nouvelle école</h1>

    <form action="{{ route('schools.store') }}" method="POST" class="max-w-2xl">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 mb-2">Nom de l'école</label>
            <input type="text" name="name" id="name" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 mb-2">Téléphone</label>
            <input type="text" name="phone" id="phone" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="address" class="block text-gray-700 mb-2">Adresse</label>
            <textarea name="address" id="address" rows="3" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div class="mb-4">
            <label for="subscription_expiry" class="block text-gray-700 mb-2">Date d'expiration de l'abonnement</label>
            <input type="date" name="subscription_expiry" id="subscription_expiry" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save mr-2"></i>Enregistrer
            </button>
            <a href="{{ route('schools.index') }}" class="ml-4 text-gray-500 hover:text-gray-700">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection