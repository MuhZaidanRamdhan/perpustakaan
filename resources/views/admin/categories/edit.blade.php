@extends('admin.layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.categories.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl shadow-sm hover:bg-blue-50 transition">

            <span class="material-symbols-outlined text-[20px]">
                arrow_back
            </span>

            Kembali ke Daftar Kategori
        </a>
    </div>
    <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-sm border p-8">

        <h2 class="text-2xl font-bold text-slate-800 mb-6">
            Edit Kategori
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

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Nama Kategori
                </label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan nama kategori">
            </div>

            {{-- BUTTON --}}
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                Update Kategori
            </button>

        </form>
    </div>
@endsection
