@extends('layouts.app')

@section('title', $tpmodul->title . ' - CASLAB')

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
@endpush

@section('content')
<div class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('tpmoduls.publicShow') }}" 
               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Halaman Post
            </a>
        </div>

        {{-- Article Card --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            {{-- Header --}}
            <div class="px-8 py-6 border-b border-gray-200 bg-gray-50">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">
                    {{ $tpmodul->judul }}
                </h1>
                
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>{{ $tpmodul->user->name ?? 'Unknown Author' }}</span>
                        </div>
                        
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ $tpmodul->created_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                    
                    @if($tpmodul->created_at != $tpmodul->updated_at)
                        <span class="text-gray-500 italic">
                            Updated {{ $tpmodul->updated_at->diffForHumans() }}
                        </span>
                    @endif
                </div>
                <p class="my-4 font-bold">
                    Sub Judul
                </p>
                <p>
                    {{ $tpmodul->subjudul }}
                </p>
                <p class="my-4 font-bold">
                    Deskripsi
                </p>
            </div>

            {{-- Content --}}
            <div class="px-8 py-8">
                
                <div class="prose max-w-none text-gray-700 leading-relaxed whitespace-pre-wrap">
                    {{ $tpmodul->deskripsi }}
                </div>
            </div>

        </div>

        {{-- Related Information --}}
        <div class="mt-8 grid gap-6">
            {{-- Created Info --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi TP Modul</h3>
                <dl class="space-y-2">
                    <div class="flex justify-between">
                        <dt class="text-gray-600">Status:</dt>
                        <dd class="text-gray-900 font-medium">Dipublikasi</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-600">Dibuat:</dt>
                        <dd class="text-gray-900">{{ $tpmodul->created_at->format('M d, Y g:i A') }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-600">Terakhir Diperbarui:</dt>
                        <dd class="text-gray-900">{{ $tpmodul->updated_at->format('M d, Y g:i A') }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>

@endsection
