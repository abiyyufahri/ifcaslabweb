{{--
==================================================================
MASTER LAYOUT - Template utama untuk semua halaman
==================================================================

File ini adalah master layout yang digunakan oleh semua view.
Menggunakan Tailwind CSS untuk styling.

Blade Directives yang digunakan:
- @yield('section') : Placeholder untuk content dari child view
- @section('name') : Define section yang bisa di-override
- @stack('name')   : Stack untuk inject scripts/styles dari child view

Struktur:
1. HEAD - Meta tags, title, CSS
2. NAVIGATION - Menu navigasi
3. MAIN CONTENT - Area konten utama (yield)
4. FOOTER - Footer halaman
5. SCRIPTS - JavaScript files
--}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Meta tags untuk SEO dan responsive --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- CSRF Token untuk security (digunakan di semua form POST/PUT/DELETE) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- Title dinamis dari child view, default: CASLAB --}}
    <title>@yield('title', 'CASLAB - Computer and System Laboratory')</title>
    
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    
    {{-- Tailwind CSS - Styling framework --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Stack untuk custom CSS dari child view --}}
    @stack('styles')
</head>
<body class="bg-white min-h-screen">
    {{--
    ==================================================================
    NAVIGATION BAR - Menu navigasi utama
    ==================================================================
    Menggunakan komponen modular yang di-extract ke components/nav.blade.php
    --}}
    @include('components.nav')

    {{--
    ==================================================================
    FLASH MESSAGES - Notifikasi success/error
    ==================================================================
    
    Flash message adalah data yang disimpan di session untuk 1 request saja.
    Digunakan untuk notifikasi setelah action (create/update/delete).
    
    Di Controller:
    return redirect()->route('products.index')->with('success', 'Berhasil!');
    
    session('success') = Ambil value dari session key 'success'
    --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-4 mt-10">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                {{-- Button untuk close alert --}}
                <button type="button" 
                        class="absolute top-0 bottom-0 right-0 px-4 py-3"
                        onclick="this.parentElement.style.display='none'">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-4 mt-10">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <button type="button" 
                        class="absolute top-0 bottom-0 right-0 px-4 py-3"
                        onclick="this.parentElement.style.display='none'">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{--
    ==================================================================
    MAIN CONTENT AREA - Konten utama dari child view
    ==================================================================
    
    @yield('content') = Placeholder yang akan diisi oleh child view
    
    Child view menggunakan:
    @extends('layouts.app')
    @section('content')
        ... konten di sini ...
    @endsection
    
    pt-16 = padding-top untuk fixed navigation
    --}}
    <main class="pt-16">
        @yield('content')
    </main>

    {{--
    ==================================================================
    FOOTER - Footer halaman
    ==================================================================
    --}}
    <footer class="bg-white text-black my-5 px-4 mt-auto">
        <div class="max-w-6xl mx-auto text-center">
            <p class="text-gray-400 mb-6">
                Informatics Laboratory 
            </p>
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} IFLAB. All rights reserved.
                {{-- date('Y') = Tahun saat ini --}}
            </p>
        </div>
    </footer>

    {{--
    ==================================================================
    SCRIPTS - JavaScript files
    ==================================================================
    
    @stack('scripts') = Tempat untuk inject custom scripts dari child view
    
    Child view bisa inject script dengan:
    @push('scripts')
        <script>
            // custom JavaScript
        </script>
    @endpush
    --}}
    @stack('scripts')
</body>
</html>
