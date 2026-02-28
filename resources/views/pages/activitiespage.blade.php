@extends('layouts.layout')

@section('content')
    <main class="flex-1 w-full max-w-[1200px] mx-auto px-4 py-8">

        {{-- HEADER HERO --}}
        <div class="mb-10 rounded-3xl bg-gradient-to-r from-violet-600 to-indigo-600 p-8 text-white shadow-xl">
            <h2 class="text-2xl font-bold">
                Halo, {{ auth()->user()->name }} 👋
            </h2>
            <p class="text-indigo-100 mt-2">
                Pantau pinjaman dan riwayat bacamu di sini.
            </p>
        </div>

        {{-- PINJAMAN AKTIF --}}
        <h1 class="text-2xl font-bold mb-6">Pinjamanku Saat Ini</h1>

        @if ($activeBorrowings->isEmpty())
            <div class="bg-white rounded-2xl p-8 border text-center shadow-sm">
                <span class="material-symbols-outlined text-5xl text-gray-300">
                    menu_book
                </span>
                <h3 class="font-bold text-lg text-gray-600 mt-3">
                    Belum ada buku yang dipinjam
                </h3>
                <p class="text-sm text-gray-400 mt-2">
                    Yuk mulai petualangan bacamu sekarang 📚
                </p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                @foreach ($activeBorrowings as $borrowing)
                    @php
                        $dueDate = \Carbon\Carbon::parse($borrowing->due_date);
                        $today = now();
                        $diff = $today->diffInDays($dueDate, false);
                    @endphp

                    <div class="bg-white rounded-2xl p-5 border shadow-sm">

                        {{-- STATUS --}}
                        @if ($diff < 0)
                            <span class="px-3 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-full">
                                Terlambat {{ abs($diff) }} Hari
                            </span>
                        @elseif($diff <= 3)
                            <span class="px-3 py-1 bg-orange-100 text-orange-600 text-xs font-bold rounded-full">
                                {{ $diff }} Hari Lagi
                            </span>
                        @else
                            <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full">
                                Masih Lama
                            </span>
                        @endif

                        <h3 class="font-bold text-lg mt-3">
                            {{ $borrowing->book->title }}
                        </h3>

                        <p class="text-gray-500 text-sm">
                            {{ $borrowing->book->author }}
                        </p>

                        <div class="mt-4">
                            <p class="text-xs text-gray-400">Batas Kembali</p>
                            <p class="text-sm font-semibold">
                                {{ $dueDate->format('d M Y') }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif


        {{-- RIWAYAT --}}
        <h1 class="text-2xl font-bold mb-6">Riwayat Peminjaman</h1>

        @if ($historyBorrowings->isEmpty())
            <div class="bg-white rounded-2xl p-8 border text-center shadow-sm">
                <span class="material-symbols-outlined text-5xl text-gray-300">
                    history
                </span>
                <h3 class="font-bold text-lg text-gray-600 mt-3">
                    Belum ada riwayat peminjaman
                </h3>
                <p class="text-sm text-gray-400 mt-2">
                    Riwayat akan muncul setelah buku dikembalikan.
                </p>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($historyBorrowings as $borrowing)
                    <div class="bg-white rounded-xl p-4 border shadow-sm flex justify-between items-center">

                        <div>
                            <p class="font-semibold">
                                {{ $borrowing->book->title }}
                            </p>

                            <p class="text-sm text-gray-400">
                                Dikembalikan:
                                {{ \Carbon\Carbon::parse($borrowing->returned_at)->format('d M Y') }}
                            </p>
                        </div>

                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full">
                            Selesai
                        </span>

                    </div>
                @endforeach
            </div>
        @endif

    </main>
@endsection
