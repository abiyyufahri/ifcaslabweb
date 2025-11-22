@extends('layouts.app')

@section('title', 'TP Modul - IFLAB')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Hero Header --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-4">
                <span class="bg-[#404D93] bg-clip-text text-transparent">
                    IFLAB
                </span> 
            </h1>
            <p class="text-xl text-gray-600">
                Cek Post dan Informasi di Informatic Laboratory
            </p>
        </div>

        {{-- TP Modul Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($tpmoduls as $tpmodul)
                <tpmodul class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    
                    {{-- Card Header --}}
                    <div class="p-6 bg-linear-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 min-h-14">
                            {{ $tpmodul->judul }}
                        </h2>
                        <div class="flex items-center text-sm text-gray-600 space-x-4">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $tpmodul->user->name ?? 'Unknown' }}
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $tpmodul->created_at->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                    
                    {{-- Card Body --}}
                    <div class="p-6">
                        <p class="font-bold">
                            Subjudul
                        </p>
                        <p class="mb-4">
                            {{ Str::limit($tpmodul->subjudul, 10) }}
                        </p>
                        <p class="font-bold">
                            Deskripsi
                        </p>
                        
                        <p class="text-gray-700 leading-relaxed line-clamp-3 mb-4">
                            {{ Str::limit($tpmodul->deskripsi, 150) }}
                        </p>
                        
                        {{-- Read More Button --}}
                        <a href="{{ route('tpmoduls.publicShowDetail', $tpmodul) }}" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition group">
                            Read More
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    
                </tpmodul>
            @empty
                {{-- Empty State --}}
                <div class="col-span-full text-center py-16">
                    <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-6 text-2xl font-semibold text-gray-900">
                        No TP Modul Yet
                    </h3>
                    <p class="mt-2 text-gray-600 text-lg">
                        Check back soon for updates and insights from IFLAB
                    </p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($tpmoduls->hasPages())
            <div class="mt-12">
                {{ $tpmoduls->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection
