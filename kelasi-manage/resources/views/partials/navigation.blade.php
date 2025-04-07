<nav class="bg-blue-800 text-white shadow-lg">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="{{ url('/') }}" class="text-xl font-bold">
                Kelasi Manage
            </a>
        </div>
        
        <div class="flex items-center space-x-6">
            @auth
                <span class="text-sm">Bienvenue, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm hover:text-blue-200">
                        <i class="fas fa-sign-out-alt mr-1"></i> Déconnexion
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm hover:text-blue-200">
                    <i class="fas fa-sign-in-alt mr-1"></i> Connexion
                </a>
            @endauth
        </div>
    </div>
</nav>