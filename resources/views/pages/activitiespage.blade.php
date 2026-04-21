@extends('layouts.layout')

@section('content')

    <main class="flex-1 w-full max-w-[1200px] mx-auto px-4 py-8">

        {{-- HEADER --}}
        <div class="mb-10 rounded-3xl bg-gradient-to-r from-violet-600 to-indigo-600 p-8 text-white shadow-xl">
            <h2 class="text-2xl font-bold">
                Halo, {{ auth()->user()->name }} 👋
            </h2>
            <p class="text-indigo-100 mt-2">
                Pantau pinjaman dan riwayat bacamu di sini.
            </p>
        </div>

        {{-- ================= ACTIVE ================= --}}
        <h1 class="text-2xl font-bold mb-6">Pinjamanku Saat Ini</h1>

        @if ($activeBorrowings->isEmpty())
            <div class="bg-white rounded-2xl p-8 border text-center shadow-sm">
                <h3 class="font-bold text-lg text-gray-600">
                    Belum ada buku yang dipinjam
                </h3>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                @foreach ($activeBorrowings as $borrowing)
                    @php
                        $dueDate = $borrowing->due_date
                            ? \Carbon\Carbon::parse($borrowing->due_date)->startOfDay()
                            : null;

                        $today = now()->startOfDay();

                        $diff = $dueDate ? (int) $today->diffInDays($dueDate, false) : null;
                    @endphp

                    <div class="bg-white rounded-2xl p-5 border shadow-sm">

                        {{-- STATUS --}}
                        @if ($borrowing->status === 'pending')
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-full">
                                Menunggu Persetujuan
                            </span>
                        @elseif ($borrowing->status === 'approved')
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-bold rounded-full">
                                Menunggu Diambil
                            </span>
                        @elseif ($borrowing->status === 'borrowed')
                            @if ($diff < 0)
                                <span class="px-3 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-full">
                                    Terlambat {{ abs($diff) }} Hari
                                </span>
                            @elseif ($diff === 0)
                                <span
                                    class="px-3 py-1 bg-red-200 text-red-700 text-xs font-bold rounded-full animate-pulse">
                                    Segera Kembalikan (Hari Ini)
                                </span>
                            @elseif ($diff === 1)
                                <span class="px-3 py-1 bg-orange-200 text-orange-700 text-xs font-bold rounded-full">
                                    Segera Kembalikan (H-1)
                                </span>
                            @elseif ($diff <= 3)
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">
                                    {{ $diff }} Hari Lagi
                                </span>
                            @else
                                <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full">
                                    {{ $diff }} Hari Lagi
                                </span>
                            @endif
                        @endif

                        {{-- TITLE --}}
                        <h3 class="font-bold text-lg mt-3">
                            {{ $borrowing->book->title }}
                        </h3>

                        <p class="text-gray-500 text-sm">
                            {{ $borrowing->book->author }}
                        </p>

                        {{-- DATE --}}
                        <div class="mt-4 space-y-1">

                            @if ($borrowing->borrowed_at)
                                <div>
                                    <p class="text-xs text-gray-400">Tanggal Pinjam</p>
                                    <p class="text-sm font-semibold">
                                        {{ \Carbon\Carbon::parse($borrowing->borrowed_at)->format('d M Y') }}
                                    </p>
                                </div>
                            @endif

                            <div>
                                <p class="text-xs text-gray-400">Batas Kembali</p>
                                <p class="text-sm font-semibold">
                                    {{ $borrowing->due_date ? \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') : '-' }}
                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif


        {{-- ================= HISTORY ================= --}}
        <h1 class="text-2xl font-bold mb-6">Riwayat Peminjaman</h1>

        @if ($historyBorrowings->isEmpty())
            <div class="bg-white rounded-2xl p-8 border text-center shadow-sm">
                <h3 class="font-bold text-lg text-gray-600">
                    Belum ada riwayat
                </h3>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($historyBorrowings as $borrowing)
                    <div class="bg-white rounded-xl p-4 border shadow-sm flex justify-between items-center">

                        <div>
                            <p class="font-semibold">
                                {{ $borrowing->book->title }}
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
                        </div>

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
                @endforeach
            </div>
        @endif

    </main>

@endsection
