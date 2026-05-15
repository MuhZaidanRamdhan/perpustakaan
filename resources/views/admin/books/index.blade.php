@extends('admin.layouts.admin')

@section('title', 'Buku')

@section('content')
    <div class="flex items-center justify-between gap-3 mb-5">
        <h1 class="text-lg sm:text-2xl font-bold text-slate-800">
            Buku
        </h1>
        <a href="{{ route('admin.books.create') }}"
            class="shrink-0 bg-blue-500 hover:bg-blue-600 text-white px-3 sm:px-4 py-2 rounded-xl text-sm font-medium">
            + Tambah Buku
        </a>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}'
            });
        </script>
    @endif

    <div class="mb-4 flex justify-between items-center flex-wrap gap-3">

        <div class="mb-4">
            <form method="GET" action="{{ route('admin.books.index') }}">

                <div class="flex gap-2 w-full">

                    {{-- INPUT --}}
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama buku..."
                        class="flex-1 border rounded-xl px-4 py-2 text-sm">

                    {{-- BUTTON SEARCH --}}
                    <button
                        class="shrink-0 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium">
                        Cari
                    </button>

                    {{-- RESET --}}
                    @if (request('search'))
                        <a href="{{ route('admin.books.index') }}"
                            class="shrink-0 bg-gray-200 px-4 py-2 rounded-xl text-sm flex items-center">
                            Reset
                        </a>
                    @endif

                </div>
            </form>
        </div>

    </div>
    <div class="bg-white rounded shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm border-collapse min-w-[800px]">
                <thead class="bg-white">
                    <tr>
                        <th class="p-3 text-center">Cover</th>
                        <th class="p-3 text-left">Judul</th>
                        <th class="p-3 text-left">Author</th>
                        {{-- <th class="p-3 text-left">Deskripsi</th> --}}
                        <th class="p-3 text-center">Stock</th>
                        <th class="p-3 text-left">Kategori</th>
                        <th class="p-3 text-center">Ebook PDF</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($adminbooks as $book)
                        <tr class="border-t hover:bg-gray-50">

                            {{-- COVER --}}
                            <td class="p-3 text-center">
                                @if ($book->image)
                                    <img src="{{ asset('storage/' . $book->image) }}"
                                        class="w-16 h-24 object-cover rounded-xl mx-auto shadow-sm">
                                @else
                                    <img src="https://picsum.photos/seed/{{ $book->id }}/80/120"
                                        class="w-16 h-24 object-cover rounded-xl mx-auto shadow-sm">
                                @endif
                            </td>

                            {{-- TITLE --}}
                            <td class="p-3 font-medium">
                                {{ $book->title }}
                            </td>

                            {{-- AUTHOR --}}
                            <td class="p-3">
                                {{ $book->author }}
                            </td>

                            {{-- deskripsi --}}
                            {{-- <td class="p-3">
                                {{ $book->description ?? 'belum ada deskripsi pada buku ini.' }}
                            </td> --}}

                            {{-- STOCK --}}
                            <td class="p-3 text-center">
                                {{ $book->stock }}
                            </td>

                            {{-- CATEGORY --}}
                            <td class="p-3">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold
                                        {{ $book->category->name == 'Fiksi' ? 'bg-blue-100 text-blue-600' : 'bg-purple-100 text-purple-600' }}">
                                    {{ $book->category->name }}
                                </span>
                            </td>

                            {{-- PDF --}}
                            <td class="p-3 text-center">
                                @if ($book->ebook_file)
                                    <a href="{{ asset('storage/' . $book->ebook_file) }}" target="_blank"
                                        class="text-blue-600 font-medium underline">
                                        Lihat PDF
                                    </a>
                                @else
                                    <span class="text-gray-400">
                                        PDF tidak tersedia
                                    </span>
                                @endif
                            </td>

                            {{-- ACTION --}}
                            <td class="p-3 text-center space-x-2">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.books.edit', $book) }}"
                                        class="px-3 py-1 bg-blue-100 text-blue-600 rounded-lg text-sm font-medium">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.books.destroy', $book) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Yakin hapus?')"
                                            class="px-3 py-1 bg-red-100 text-red-600 rounded-lg text-sm font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center">

                                <div class="flex flex-col items-center justify-center">

                                    <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-4">
                                        <span class="material-symbols-outlined text-gray-400 text-3xl">
                                            search_off
                                        </span>
                                    </div>

                                    <h3 class="text-lg font-semibold text-slate-700">
                                        Buku tidak ditemukan
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Tidak ada buku yang sesuai dengan pencarian
                                        <span class="font-medium">"{{ request('search') }}"</span>
                                    </p>

                                    <a href="{{ route('admin.books.index') }}"
                                        class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-xl text-sm">
                                        Lihat Semua Buku
                                    </a>

                                </div>

                            </td>
                        </tr>
                    @endforelse
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $adminbooks->links() }}
    </div>
@endsection
