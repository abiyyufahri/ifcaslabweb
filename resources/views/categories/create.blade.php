@extends('layouts.app')

@section('title', 'Buat Kategori Kategori - CASLAB')

@section('content')
<div class="py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Buat Ketgori Kategori Baru</h1>
            <p class="mt-2 text-gray-600">Isi detail untuk membuat kategori baru</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-xl shadow-lg p-8">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                {{-- nama Input --}}
                <div class="mb-6">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Kategori
                    </label>
                    <input id="nama" 
                           name="nama" 
                           type="text" 
                           required
                           value="{{ old('nama') }}"
                           placeholder="Masukkan judul kategori"
                           class="appearance-none block w-full px-4 py-3 border @error('nama') border-red-300 @else border-gray-300 @enderror rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition">
                    @error('nama')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('tpmoduls.index') }}" 
                       class="px-6 py-3 bg-white text-gray-700 border-2 border-gray-300 rounded-lg font-medium hover:bg-gray-50 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-[#404D93] text-white rounded-lg font-medium hover:from-blue-700 hover:to-indigo-700 transition-all shadow-lg hover:shadow-xl">
                        Buat Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
