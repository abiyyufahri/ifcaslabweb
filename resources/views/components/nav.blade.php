{{--
==================================================================
NAVIGATION COMPONENT - Reusable navigation bar
==================================================================

Komponen navigasi yang bisa digunakan di berbagai view.
Automatically detects authentication status dan menampilkan menu yang sesuai.

Usage:
@include('components.nav')
--}}

<nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('assets/images/iflab_logo.png') }}" alt="" srcset="" class="w-16 sm:w-20">
                </a>
            </div>
            
            <!-- Desktop Navigation Links (flex: ditampilkan) -->
            <div class="hidden lg:flex items-center space-x-4">
                {{-- Home Link (always visible) --}}
                <a href="{{ url('/') }}" 
                   class="px-4 py-2 text-gray-700 hover:text-[#404D93] font-medium transition-colors {{ request()->is('/') ? 'text-blue-600' : '' }}">
                    Home
                </a>

                <a href="{{ route('tpmoduls.publicShow') }}" 
                       class="px-4 py-2 hover:text-blue-600 font-medium {{ request()->routeIs('tpmoduls.publicShow') ||  request()->routeIs('tpmoduls.publicShowDetail') ? 'text-blue-600' : 'text-gray-700'}}">
                        TP Modul
                </a>
                
                @if(session()->has('user'))
                    {{-- Authenticated User Navigation --}}
                    <a href="{{ route('tpmoduls.index') }}"
                        class="px-4 py-2 font-medium transition-colors hover:text-blue-600 {{ request()->routeIs('tpmoduls.*') && !request()->routeIs('tpmoduls.publicShow') && !request()->routeIs('tpmoduls.publicShowDetail')  ? 'text-blue-600' : 'text-gray-700' }}">
                        Kelola TP Modul
                    </a>

                    <a href="{{ route('categories.index') }}"
                        class="px-4 py-2 font-medium transition-colors hover:text-blue-600 {{ request()->routeIs('categories.*') ? 'text-blue-600' : 'text-gray-700' }}">
                        Kelola Kategori
                    </a>

                    {{-- User Info & Logout --}}
                    <div class="flex items-center space-x-3 ml-4 pl-4 border-l border-gray-300">
                        <span class="text-gray-700 text-sm font-medium">
                            {{ session('user')->name }}
                        </span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="px-4 py-2 text-red-600 hover:text-red-700 font-medium transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    {{-- Guest User Navigation --}}
                    <a href="{{ route('login') }}" 
                       class="px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors">
                        Login
                    </a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" 
                           class="px-6 py-2 bg-[#404D93] text-white rounded-lg font-medium hover:from-blue-700 hover:to-indigo-700 transition-all shadow-lg hover:shadow-xl">
                            Sign Up
                        </a>
                    @endif
                @endif
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-[#404D93] hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <span class="sr-only">Open main menu</span>
                    <!-- Hamburger icon -->
                    <svg class="block h-6 w-6" id="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Close icon -->
                    <svg class="hidden h-6 w-6" id="close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="hidden lg:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
            <a href="{{ url('/') }}" 
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#404D93] hover:bg-gray-50 {{ request()->is('/') ? 'bg-gray-100 text-blue-600' : '' }}">
                Home
            </a>

            <a href="{{ route('tpmoduls.publicShow') }}" 
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 {{ request()->routeIs('tpmoduls.publicShow') ? 'bg-gray-100 text-blue-600' : '' }}">
                TP Modul
            </a>
            
            @if(session()->has('user'))
                <a href="{{ route('tpmoduls.index') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 {{ request()->routeIs('tpmoduls.*') && !request()->routeIs('tpmoduls.publicShow') && !request()->routeIs('tpmoduls.publicShowDetail') ? 'bg-gray-100 text-blue-600' : '' }}">
                    Kelola TP Modul
                </a>

                <a href="{{ route('categories.index') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 {{ request()->routeIs('categories.*') ? 'bg-gray-100 text-blue-600' : '' }}">
                    Kelola Kategori
                </a>


                <div class="border-t border-gray-200 pt-4 pb-3">
                    <div class="px-3 mb-2">
                        <span class="text-gray-700 text-sm font-medium">
                            {{ session('user')->name }}
                        </span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" 
                                class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:text-red-700 hover:bg-red-50">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" 
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50">
                    Login
                </a>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" 
                       class="block px-3 py-2 mx-3 my-2 bg-[#404D93] text-white rounded-lg text-center font-medium hover:bg-blue-700 transition-all shadow-lg">
                        Sign Up
                    </a>
                @endif
            @endif
        </div>
    </div>
</nav>

{{-- JavaScript for mobile menu toggle --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = mobileMenu.contains(event.target);
            const isClickOnButton = mobileMenuButton.contains(event.target);
            
            if (!isClickInsideMenu && !isClickOnButton && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });
    });
</script>
