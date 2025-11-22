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
            <a href="{{ route('tpmoduls.index') }}" 
               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke TP Modul
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

            {{-- Actions --}}
            <div class="px-8 py-6 border-t border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('tpmoduls.edit', $tpmodul) }}" 
                           class="inline-flex items-center px-6 py-3 bg-[#404D93] text-white rounded-lg font-medium hover:from-blue-700 hover:to-indigo-700 transition-all shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit TP Modul
                        </a>
                    </div>
                    
                    <button command="show-modal" commandfor="delete-dialog" 
                            class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Hapus TP Modul
                    </button>
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

{{-- Delete Confirmation Modal --}}
<el-dialog>
    <dialog id="delete-dialog" aria-labelledby="delete-dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

        <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
            <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl outline -outline-offset-1 outline-gray-200 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-red-600">
                                <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 id="delete-dialog-title" class="text-base font-semibold text-gray-900">Hapus TP Modul</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus "{{ $tpmodul->title }}"? Semua data tp Modul akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <form action="{{ route('tpmoduls.destroy', $tpmodul) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white hover:bg-red-500 sm:ml-3 sm:w-auto">Hapus</button>
                    </form>
                    <button type="button" command="close" commandfor="delete-dialog" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</button>
                </div>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>
@endsection
