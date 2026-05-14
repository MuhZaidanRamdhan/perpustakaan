@extends('admin.layouts.admin')

@section('title', 'Edit Buku')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.books.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl shadow-sm hover:bg-blue-50 transition">

            <span class="material-symbols-outlined text-[20px]">
                arrow_back
            </span>

            Kembali ke Daftar Buku
        </a>
    </div>
    <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-sm border p-8">

        <h2 class="text-2xl font-bold text-slate-800 mb-6">
            Edit Buku
        </h2>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-600 p-4 rounded-xl">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Link kembali --}}

        <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Judul Buku
                </label>
                <input type="text" name="title" value="{{ old('title', $book->title) }}"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan judul buku">
            </div>

            {{-- Author --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Author
                </label>
                <input type="text" name="author" value="{{ old('author', $book->author) }}"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan nama author">
            </div>

            {{-- Description --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Deskripsi
                </label>
                <textarea name="description" rows="4"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan deskripsi buku">{{ old('description', $book->description) }}</textarea>
            </div>

            {{-- Stock --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Stock
                </label>
                <input type="number" name="stock" value="{{ old('stock', $book->stock) }}"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            {{-- Category --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Kategori
                </label>
                <select name="category_id"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">

                    <option value="">Pilih Kategori</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Cover --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Cover Buku
                </label>

                <input type="file" name="image" class="w-full rounded-xl border border-slate-200 p-3">

                @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}"
                        class="mt-4 w-40 h-56 object-cover rounded-xl shadow-sm">
                @endif
            </div>

            {{-- Ebook --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Ebook PDF
                </label>

                <input type="file" name="ebook_file" accept=".pdf"
                    class="w-full rounded-xl border border-slate-200 p-3">

                @if ($book->ebook_file)
                    <a href="{{ asset('storage/' . $book->ebook_file) }}" target="_blank"
                        class="inline-block mt-3 text-blue-600 font-medium underline">
                        Preview Ebook Saat Ini
                    </a>
                @endif
            </div>

            {{-- BUTTON --}}
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                Update Buku
            </button>

        </form>
    </div>
@endsection
