@extends('admin.layouts.admin')

@section('title', 'Tambah Buku')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Buku</h1>

<form action="{{ route('admin.books.store') }}" method="POST"
      class="bg-white p-4 rounded shadow max-w-md">
    @csrf

    <div class="mb-3">
        <label>Judul</label>
        <input name="title" class="w-full border p-2 rounded">
    </div>

    <div class="mb-3">
        <label>Author</label>
        <input name="author" class="w-full border p-2 rounded">
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" name="stock" class="w-full border p-2 rounded">
    </div>

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>
@endsection
