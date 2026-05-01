@extends('admin.layouts.admin')

@section('title', 'Tambah Buku')

@section('content')
    <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-sm border p-8">

        <h2 class="text-2xl font-bold text-slate-800 mb-6">
            Tambah Buku
        </h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-600 p-4 rounded-xl">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- Judul --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">Judul Buku</label>
                <input type="text" name="title"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan judul buku">
            </div>

            {{-- Author --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">Author</label>
                <input type="text" name="author"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan nama author">
            </div>

            {{-- Stock --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">Stock</label>
                <input type="number" name="stock"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan jumlah stok">
            </div>

            {{-- Category --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">Kategori</label>
                <select name="category_id"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">

                    <option value="">Pilih Kategori</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Upload Gambar --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">Cover Buku</label>
                <input type="file" name="image" id="imageInput" accept="image/*"
                    class="w-full rounded-xl border border-slate-200 p-3">

                {{-- Preview image --}}
                <img id="imagePreview" class="hidden mt-4 w-40 h-56 object-cover rounded-xl shadow-sm">
            </div>

            {{-- Upload PDF --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">Ebook PDF</label>
                <input type="file" name="ebook_file" id="pdfInput" accept=".pdf"
                    class="w-full rounded-xl border border-slate-200 p-3">

                {{-- Preview PDF --}}
                <div id="pdfPreview" class="hidden mt-3">
                    <a id="pdfLink" target="_blank" class="text-blue-600 font-medium underline">
                        Preview PDF
                    </a>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                Simpan Buku
            </button>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const imageInput = document.getElementById('imageInput');
            const pdfInput = document.getElementById('pdfInput');

            // preview image
            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];

                    if (file) {
                        const preview = document.getElementById('imagePreview');

                        preview.src = URL.createObjectURL(file);
                        preview.classList.remove('hidden');
                    }
                });
            }

            // preview pdf
            if (pdfInput) {
                pdfInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];

                    if (file) {
                        const preview = document.getElementById('pdfPreview');
                        const link = document.getElementById('pdfLink');

                        link.href = URL.createObjectURL(file);
                        link.innerText = file.name;

                        preview.classList.remove('hidden');
                    }
                });
            }

        });
    </script>
@endsection
