@extends('admin.layouts.admin')

@section('title', 'Books')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Books</h1>
    <a href="{{ route('admin.books.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">
        + Tambah Buku
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded shadow">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Judul</th>
                <th class="p-3 text-left">Author</th>
                <th class="p-3 text-center">Stock</th>
                <th class="p-3 text-left">Kategori</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adminbooks as $book)
            <tr class="border-t">
                <td class="p-3">{{ $book->title }}</td>
                <td class="p-3">{{ $book->author }}</td>
                <td class="p-3 text-center">{{ $book->stock }}</td>
                <td>{{ $book->category->name ?? '-' }}</td>
                <td class="p-3 text-center space-x-2">
                    <a href="{{ route('admin.books.edit', $book) }}"
                       class="text-blue-500">Edit</a>

                    <form action="{{ route('admin.books.destroy', $book) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')"
                                class="text-red-500">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $adminbooks->links() }}
</div>
@endsection
