@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8 rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 p-8 text-white shadow-xl">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            {{-- LEFT --}}
            <div>
                <h2 class="text-3xl font-bold">
                    Selamat Datang, {{ auth()->user()->name }} 👋
                </h2>

                <p class="text-blue-100 mt-2 text-sm md:text-base">
                    Kelola koleksi buku, pantau peminjaman dan lihat aktivitas perpustakaan dengan mudah.
                </p>
            </div>

            {{-- RIGHT --}}
            <div class="bg-white/20 backdrop-blur-md px-5 py-4 rounded-2xl">
                <p class="text-sm text-blue-100">Hari ini</p>
                <p class="text-lg font-semibold">
                    {{ now()->format('d M Y') }}
                </p>
            </div>

        </div>
    </div>

    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">

        {{-- STOK HABIS --}}
        <div class="bg-white rounded-3xl p-6 my-8 shadow-sm hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-xs md:text-sm">Stok Habis</p>
                    <h3 class="text-2xl md:text-4xl font-bold text-slate-800 mt-2">
                        {{ $outOfStockBooks }}
                    </h3>
                    <p class="hidden md:block text-sm text-red-600 mt-2">
                        Perlu restock
                    </p>
                </div>

                <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl">
                        warning
                    </span>
                </div>
            </div>
        </div>

        {{-- TOTAL BUKU --}}
        <a href="{{ route('admin.books.index') }}">
            <div class="bg-white rounded-3xl p-6 my-8 shadow-sm hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-xs md:text-sm">Total Buku</p>
                        <h3 class="text-2xl md:text-4xl font-bold text-slate-800 mt-2">
                            {{ $totalBooks }}
                        </h3>
                        <p class="hidden md:block text-sm text-blue-600 mt-2">
                            Koleksi tersedia
                        </p>
                    </div>

                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-3xl">
                            menu_book
                        </span>
                    </div>
                </div>
            </div>
        </a>

        {{-- PEMINJAMAN --}}
        <a href="{{ route('admin.borrowings.index') }}">
            <div class="bg-white rounded-3xl p-6 my-8 shadow-sm hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-xs md:text-sm">Peminjaman Aktif</p>
                        <h3 class="text-2xl md:text-4xl font-bold text-slate-800 mt-2">
                            {{ $activeBorrowings }}
                        </h3>
                        <p class="hidden md:block text-sm text-green-600 mt-2">
                            Sedang dipinjam
                        </p>
                    </div>

                    <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-3xl">
                            library_books
                        </span>
                    </div>
                </div>
            </div>
        </a>

        {{-- USER --}}
        <div class="bg-white rounded-3xl p-6 my-8 shadow-sm hover:shadow-lg transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-xs md:text-sm">Total User</p>
                    <h3 class="text-2xl md:text-4xl font-bold text-slate-800 mt-2">
                        {{ $totalUsers }}
                    </h3>
                    <p class="hidden md:block text-sm text-purple-600 mt-2">
                        Pengguna terdaftar
                    </p>
                </div>

                <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl">
                        group
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 bg-white rounded-3xl p-6 shadow-sm">

        <div class="flex items-center justify-between mb-5">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-800">
                Buku Populer
            </h2>
        </div>

        <div class="space-y-4">
            @forelse ($popularBooks as $book)
                <div class="flex items-center justify-between border-b pb-3">
                    <div>
                        <h3 class="font-semibold text-slate-800">
                            {{ $book->title }}
                        </h3>
                        <p class="text-sm text-slate-500">
                            {{ $book->author }}
                        </p>
                    </div>

                    <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium">
                        {{ $book->borrowings_count }}x dipinjam
                    </span>
                </div>
            @empty
                <p class="text-slate-500 text-sm">
                    Belum ada data peminjaman.
                </p>
            @endforelse
        </div>
    </div>
@endsection
