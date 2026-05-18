@extends('admin.layouts.admin')

@section('title', 'Kategori Buku')

@section('content')
    <div class="flex items-center justify-between gap-3 mb-5">

        <h1 class="text-lg sm:text-2xl font-bold text-slate-800">
            Kategori Buku
        </h1>

        <a href="{{ route('admin.categories.create') }}"
            class="shrink-0 bg-blue-500 hover:bg-blue-600 text-white px-3 sm:px-4 py-2 rounded-xl text-sm font-medium transition">
            + Tambah
        </a>
    </div>

    {{-- <div class="mb-4 flex justify-between items-center flex-wrap gap-3">

        <form method="GET" action="{{ route('admin.categories.index') }}">
            <div class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kategori..."
                    class="border rounded-lg px-4 py-2 text-sm w-64">

                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm">
                    Cari
                </button>

                @if (request('search'))
                    <a href="{{ route('admin.categories.index') }}" class="bg-gray-200 px-4 py-2 rounded-lg text-sm">
                        Reset
                    </a>
                @endif
            </div>
        </form>

    </div> --}}
    <div class="bg-white rounded shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm border-collapse min-w-[500px] md:min-w-full">
                <thead class="bg-white">
                    <tr>
                        <th class="p-3 text-center">Nama Kategori</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-t hover:bg-gray-50">

                            {{-- NAMA KATEGORI --}}
                            <td class="p-3 font-medium">
                                {{ $category->name }}
                            </td>

                            {{-- ACTION --}}
                            <td class="p-3 text-center space-x-2">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="px-3 py-1 bg-blue-100 text-blue-600 rounded-lg text-sm font-medium">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                        id="delete-form-{{ $category->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" onclick="confirmDelete({{ $category->id }})"
                                            class="px-3 py-1 bg-red-100 text-red-600 rounded-lg text-sm font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="mt-4">
        {{ $adminbooks->links() }}
    </div> --}}
@endsection
