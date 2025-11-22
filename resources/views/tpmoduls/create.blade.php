@extends('layouts.app')

@section('title', 'Buat TP Modul - CASLAB')

@section('content')
    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Buat TP Modul Baru</h1>
                <p class="mt-2 text-gray-600">Isi detail untuk membuat artikel baru</p>
            </div>

            {{-- Form Card --}}
            <div class="bg-white rounded-xl shadow-lg p-8">
                <form action="{{ route('tpmoduls.store') }}" method="POST">
                    @csrf
                    {{-- Title Input --}}
                    <div class="mb-6">
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul TP Modul
                        </label>
                        <input id="judul" name="judul" type="text" required value="{{ old('judul') }}"
                            placeholder="Masukkan judul TP Modul"
                            class="appearance-none block w-full px-4 py-3 border @error('judul') border-red-300 @else border-gray-300 @enderror rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition">
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="subjudul" class="block text-sm font-medium text-gray-700 mb-2">
                            Sub Judul TP Modul
                        </label>
                        <input id="subjudul" name="subjudul" type="text" required value="{{ old('subjudul') }}"
                            placeholder="Masukkan sub judul tp modul"
                            class="appearance-none block w-full px-4 py-3 border @error('judul') border-red-300 @else border-gray-300 @enderror rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition">
                        @error('subjudul')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category Select --}}

                    <div class="mb-6">
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori TP Modul
                        </label>
                        <select id="category_id" name="category_id" required
                            class="appearance-none block w-full px-4 py-3 border @error('category_id') border-red-300 @else border-gray-300 @enderror rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="" disabled selected>Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- konten Textarea --}}
                    <div class="mb-6">
                        <label for="konten" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi TP Modul
                        </label>
                        <textarea id="deskripsi" name="deskripsi" rows="12" required placeholder="Tulis deskripsi TP Modul di sini..."
                            class="appearance-none block w-full px-4 py-3 border @error('deskripsi') border-red-300 @else border-gray-300 @enderror rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 transition">{{ old('konten') }}</textarea>
                        @error('deskripsi')
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
                            Buat TP Modul
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
