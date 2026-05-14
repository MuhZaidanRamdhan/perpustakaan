@extends('layouts.layout')

@section('title', 'Riwayat Buku Saya')
@section('content')

    <main class="flex-1 w-full max-w-[1200px] mx-auto px-4 py-8">

        {{-- HEADER --}}
        <div class="mb-10 rounded-3xl bg-gradient-to-r from-violet-600 to-indigo-600 p-6 md:p-8 text-white shadow-xl">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                {{-- LEFT CONTENT --}}
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold">
                        Halo, {{ auth()->user()->name }} 👋
                    </h2>

                    <p class="text-indigo-100 mt-2">
                        Pantau pinjaman dan riwayat bacamu di sini.
                    </p>
                </div>

                {{-- RIGHT BUTTON --}}
                <a href="{{ route('collection') }}"
                    class="inline-flex items-center justify-center gap-2 bg-white text-indigo-600 font-semibold px-5 py-3 rounded-2xl shadow-md hover:scale-105 transition w-full md:w-auto">

                    <span class="material-symbols-outlined text-[20px]">
                        add_circle
                    </span>

                    Pinjam Buku Baru
                </a>

            </div>
        </div>

        {{-- ================= ACTIVE ================= --}}
        <h1 class="text-2xl font-bold mb-6">Pinjamanku Saat Ini</h1>

        @if ($activeBorrowings->isEmpty())
            <div class="bg-white rounded-2xl p-10 border text-center shadow-sm">

                {{-- ICON --}}
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-blue-50 flex items-center justify-center">
                    <span class="material-symbols-outlined text-blue-600 text-3xl">
                        menu_book
                    </span>
                </div>

                {{-- TITLE --}}
                <h3 class="font-bold text-xl text-gray-700">
                    Belum ada buku yang dipinjam
                </h3>

                {{-- SUBTITLE --}}
                <p class="text-sm text-gray-400 mt-2">
                    Yuk jelajahi koleksi buku dan mulai pinjam bacaan favoritmu.
                </p>

            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($activeBorrowings as $borrowing)
                    @php
                        $dueDate = $borrowing->due_date
                            ? \Carbon\Carbon::parse($borrowing->due_date)->startOfDay()
                            : null;

                        $today = now()->startOfDay();

                        $diff = $dueDate ? (int) $today->diffInDays($dueDate, false) : null;
                    @endphp

                    <div
                        class="bg-white rounded-2xl border shadow-sm p-4 
            flex flex-row gap-4 items-start md:items-center hover:shadow-md transition">

                        {{-- IMAGE --}}
                        <img src="{{ $borrowing->book->image
                            ? asset('storage/' . $borrowing->book->image)
                            : 'https://picsum.photos/seed/' . $borrowing->book->id . '/120/180' }}"
                            class="w-20 h-full md:w-24 md:h-32 object-cover rounded-xl flex-shrink-0">

                        {{-- CONTENT --}}
                        <div class="flex-1 min-w-0">

                            {{-- STATUS --}}
                            <div class="mb-1">
                                @if ($borrowing->status === 'pending')
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-full">
                                        ⌛ Menunggu Persetujuan
                                    </span>
                                @elseif ($borrowing->status === 'approved')
                                    <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-bold rounded-full">
                                        📕 Silahkan Ambil Buku
                                    </span>
                                @elseif ($borrowing->status === 'borrowed')
                                    @if ($diff < 0)
                                        <span
                                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                                bg-red-200 text-red-700">

                                            <span class="sm:hidden">🕐 Terlambat</span>
                                            <span class="hidden sm:inline">🕐 Terlambat {{ -$diff }} Hari</span>
                                        </span>
                                    @elseif ($diff === 0)
                                        <span
                                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                                bg-red-200 text-red-700">

                                            <span class="sm:hidden">🕐 Habis Waktu</span>
                                            <span class="hidden sm:inline">🕐 Tenggat Hari Ini</span>
                                        </span>
                                    @elseif ($diff === 1)
                                        <span
                                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                                bg-orange-200 text-orange-700">

                                            <span class="sm:hidden">🕐 H-1</span>
                                            <span class="hidden sm:inline">🕐 Segera Kembalikan (H-1)</span>

                                        </span>
                                    @elseif ($diff <= 3)
                                        <span
                                            class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">
                                            {{ $diff }} Hari Lagi
                                        </span>
                                    @else
                                        <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full">
                                            {{ $diff }} Hari Lagi
                                        </span>
                                    @endif
                                @endif
                            </div>

                            {{-- TITLE --}}
                            <h3 class="font-semibold text-base md:text-lg text-gray-800">
                                {{ $borrowing->book->title }}
                            </h3>

                            <p class="text-sm text-gray-500 mb-2">
                                {{ $borrowing->book->author }}
                            </p>

                            {{-- DATE --}}
                            <div class="flex gap-6 text-sm">
                                <div>
                                    <p class="text-gray-400 text-xs">Pinjam</p>
                                    <p class="font-medium">
                                        {{ $borrowing->borrowed_at ? \Carbon\Carbon::parse($borrowing->borrowed_at)->format('d M Y') : '-' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-gray-400 text-xs">Kembali</p>
                                    <p class="font-medium">
                                        {{ $borrowing->due_date ? \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') : '-' }}
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @endif


        {{-- ================= HISTORY ================= --}}
        <h1 class="text-2xl font-bold mb-6 mt-12">Riwayat Peminjaman</h1>

        @if ($historyBorrowings->isEmpty())
            <div class="bg-white rounded-2xl p-10 border text-center shadow-sm">

                {{-- ICON --}}
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-green-50 flex items-center justify-center">
                    <span class="material-symbols-outlined text-green-600 text-3xl">
                        history
                    </span>
                </div>

                {{-- TITLE --}}
                <h3 class="font-bold text-xl text-gray-700">
                    Belum ada riwayat peminjaman
                </h3>

                {{-- SUBTITLE --}}
                <p class="text-sm text-gray-400 mt-2">
                    Buku yang sudah dikembalikan atau pengajuan yang ditolak akan muncul di sini.
                </p>

            </div>
        @else
            <div class="space-y-4">

                @foreach ($historyBorrowings as $borrowing)
                    <div
                        class="bg-white rounded-2xl border shadow-sm p-4 
                flex items-center gap-4 hover:shadow-md transition">

                        {{-- IMAGE --}}
                        <img src="{{ $borrowing->book->image
                            ? asset('storage/' . $borrowing->book->image)
                            : 'https://picsum.photos/seed/' . $borrowing->book->id . '/100/140' }}"
                            class="w-20 h-28 object-cover rounded-xl flex-shrink-0">

                        {{-- CONTENT --}}
                        <div class="flex-1 flex flex-col sm:flex-row sm:items-center sm:justify-between">

                            {{-- LEFT --}}
                            <div>
                                <h3 class="font-semibold text-gray-800">
                                    {{ $borrowing->book->title }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ $borrowing->book->author }}
                                </p>

                                @if ($borrowing->status === 'rejected')
                                    <p class="text-sm text-red-500">
                                        Pengajuan Ditolak
                                    </p>
                                @else
                                    <p class="text-sm text-gray-400">
                                        Dikembalikan:
                                        {{ \Carbon\Carbon::parse($borrowing->returned_at)->format('d M Y') }}
                                    </p>
                                @endif

                                {{-- BADGE (MOBILE) --}}
                                <div class="mt-2 sm:hidden">
                                    @if ($borrowing->status === 'rejected')
                                        <span class="px-3 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-full">
                                            Ditolak
                                        </span>
                                    @else
                                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full">
                                            Selesai
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- BADGE (DESKTOP) --}}
                            <div class="hidden sm:block">
                                @if ($borrowing->status === 'rejected')
                                    <span class="px-3 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-full">
                                        Ditolak
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full">
                                        Selesai
                                    </span>
                                @endif
                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @endif

    </main>

@endsection
