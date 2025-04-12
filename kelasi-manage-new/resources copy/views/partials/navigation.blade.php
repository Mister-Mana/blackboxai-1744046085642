<nav class="bg-blue-800 dark:bg-gray-900 text-white shadow-lg transition-colors duration-300">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="{{ url('/') }}" class="text-xl font-bold">
                Kelasi Manage
            </a>
        </div>
        
        <div class="flex items-center space-x-6">
            @auth
                <!-- Language Switcher -->
                <div class="relative group">
                    <button class="flex items-center text-sm hover:text-blue-200">
                        <i class="fas fa-language mr-1"></i> {{ __('language') }}
                    </button>
                    <div class="absolute hidden group-hover:block right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg z-10">
                        @foreach(['en' => 'English', 'fr' => 'Français', 'ln' => 'Lingala', 'sw' => 'Swahili', 'tsh' => 'Tshiluba', 'kg' => 'Kikongo'] as $lang => $name)
                            <a href="{{ route('language.switch', $lang) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-blue-100 dark:hover:bg-gray-700">
                                {{ $name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Theme Toggle -->
                <button id="theme-toggle" class="text-sm hover:text-blue-200">
                    <i class="fas fa-moon hidden dark:block"></i>
                    <i class="fas fa-sun block dark:hidden"></i>
                </button>

                <!-- Profile Link -->
                <a href="{{ route('profile.show') }}" class="text-sm hover:text-blue-200">
                    <i class="fas fa-user mr-1"></i> {{ __('profile') }}
                </a>

                @if(Auth::user()->hasRole('super_admin'))
                    <!-- Settings Link -->
                    <a href="{{ route('settings') }}" class="text-sm hover:text-blue-200">
                        <i class="fas fa-cog mr-1"></i> {{ __('settings') }}
                    </a>
                @endif

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm hover:text-blue-200">
                        <i class="fas fa-sign-out-alt mr-1"></i> {{ __('logout') }}
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm hover:text-blue-200">
                    <i class="fas fa-sign-in-alt mr-1"></i> {{ __('login') }}
                </a>
            @endauth
        </div>
    </div>
</nav>

@push('scripts')
<script>
    // Theme toggle functionality
    const themeToggle = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    if (currentTheme === 'dark') {
        document.documentElement.classList.add('dark');
    }

    themeToggle.addEventListener('click', function() {
        const html = document.documentElement;
        html.classList.toggle('dark');
        const theme = html.classList.contains('dark') ? 'dark' : 'light';
        localStorage.setItem('theme', theme);
    });
</script>
@endpush
