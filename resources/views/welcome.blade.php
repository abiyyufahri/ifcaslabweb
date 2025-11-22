<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informatics Laboratory - Telkom University</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    
    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
<body class="bg-white">
    
    <!-- Navigation -->
    @include('components.nav')

    <!-- Hero Section -->
    <div class="min-h-screen flex items-center justify-center px-4 pt-16">
        <div class="max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                
                <div class="text-center lg:text-left space-y-8">
                    <div class="inline-block">
                        <span class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold">
                            IFLAB
                        </span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
                        <span class="bg-[#404D93] bg-clip-text text-transparent">
                            Informatics
                        </span>
                        Laboratory
                    </h1>
                    
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Selamat datang di IFLAB, laboratorium komputer dan sistem terkemuka di Telkom University yang menyediakan fasilitas lengkap untuk mendukung pembelajaran di bidang informatika.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="px-8 py-4 bg-[#404D93] text-white rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                                Artikel
                            </a>
                        @endif
                        
                        <a href="#features" 
                           class="px-8 py-4 bg-white text-gray-900 rounded-xl font-semibold border-2 border-gray-200 hover:border-blue-600 transition-all">
                            Tentang
                        </a>
                    </div>
                </div>
                
                <!-- Right Content - Illustration -->
                <div class="relative">
                    <div class="relative z-10 bg-white rounded-2xl shadow-2xl p-8 border border-gray-200">
                        <!-- Code Editor Mockup -->
                        <div class="space-y-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                            </div>
                            
                            <div class="space-y-2 font-mono text-sm">
                                <div class="flex space-x-2">
                                    <span class="text-purple-600">class</span>
                                    <span class="text-blue-600">IFLAB</span>
                                    <span class="text-gray-600">{</span>
                                </div>
                                <div class="pl-4 flex space-x-2">
                                    <span class="text-purple-600">public</span>
                                    <span class="text-blue-600">function</span>
                                    <span class="text-yellow-600">welcome()</span>
                                </div>
                                <div class="pl-4 text-gray-600">{</div>
                                <div class="pl-8 flex space-x-2">
                                    <span class="text-purple-600">return</span>
                                    <span class="text-green-600">"Hello World!"</span>
                                </div>
                                <div class="pl-4 text-gray-600">}</div>
                                <div class="text-gray-600">}</div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Tentang
                </h2>
                <p class="text-xl text-gray-600">
                    Dapatkan pengalaman terbaik dengan fitur-fitur kami
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Feature 1 -->
                <div class="p-8 bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 hover:shadow-xl transition-all">
                    <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        Layanan
                    </h3>
                    <p class="text-gray-600">
                        Website Laboratorium Praktikum Informatika Telkom University memiliki fungsionalitas untuk memberikan informasi seputar nilai praktikum dan jadwal praktikum yang akan berlangsung kepada semua warga Laboratorium Informatika.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="p-8 bg-white rounded-2xl border-2 border-gray-200 hover:border-yellow-400 hover:shadow-xl transition-all">
                    <div class="w-12 h-12 bg-yellow-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        Feedback
                    </h3>
                    <p class="text-gray-600">
                        Layanan feedback ini dibuat sebagai sarana untuk menyampaikan keluhan atau berdiskusi untuk memajukan Laboratorium Informatika. Berikut link untuk pengisian feedback. Untuk melakukan pengisian feedback wajib menggunakan akun SSO Telkom University terlebih dahulu. Buka Halaman Feedback.
                    </p>
                </div>
                
                
            </div>
        </div>
    </div>

    @include('layouts.app')

</body>
</html>