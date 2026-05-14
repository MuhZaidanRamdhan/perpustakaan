@extends('layouts.layout')

@section('title', 'Detail Buku:' . $book->title)
@section('content')
    <div class="max-w-6xl mx-auto px-6 py-10">
        <div class="max-w-4xl mx-auto mb-4">
            <a href="/koleksi-buku#collection-top"
                class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl shadow-sm hover:bg-blue-50 transition">

                <span class="material-symbols-outlined text-[20px]">
                    arrow_back
                </span>

                Kembali ke Koleksi
            </a>
        </div>
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-sm p-8">
            <div class="grid md:grid-cols-[280px_1fr] gap-8 items-start">

                {{-- LEFT IMAGE --}}
                <div>
                    <img src="{{ $book->image ? asset('storage/' . $book->image) : 'https://picsum.photos/seed/' . $book->id . '/500/700' }}"
                        class="w-full max-w-[280px] h-[420px] object-cover rounded-3xl shadow-md mx-auto">
                </div>

                {{-- RIGHT CONTENT --}}
                <div class="flex flex-col justify-center h-full">

                    <span
                        class="inline-flex w-fit mb-4 px-4 py-2 rounded-full text-sm font-semibold
                    {{ $book->category->name == 'Fiksi' ? 'bg-blue-100 text-blue-600' : 'bg-purple-100 text-purple-600' }}">
                        {{ $book->category->name }}
                    </span>

                    <h1 class="text-4xl font-bold text-slate-800 mb-3">
                        {{ $book->title }}
                    </h1>

                    <p class="text-lg text-slate-500 mb-4">
                        {{ $book->author }}
                    </p>

                    <p class="text-slate-600 mb-6 leading-relaxed justify">
                        {{ $book->description ?? 'Tidak ada deskripsi tersedia untuk buku ini.' }}
                    </p>

                    <p class="text-slate-600 mb-6">
                        Stok tersedia:
                        <span class="font-semibold">
                            {{ $book->stock }}
                        </span>
                    </p>

                    {{-- ACTION --}}
                    <div class="flex flex-col sm:flex-row gap-3 w-full">

                        @if ($borrow)
                            {{-- PENDING --}}
                            @if ($borrow->status === 'pending')
                                <button
                                    class="flex-1  h-10 bg-yellow-100 text-yellow-700 rounded-xl font-semibold cursor-not-allowed">
                                    Menunggu Persetujuan
                                </button>

                                {{-- APPROVED --}}
                            @elseif ($borrow->status === 'approved')
                                <button
                                    class="flex-1 bg-orange-100 px-6 py-2 h-10 text-orange-700 rounded-xl font-semibold cursor-not-allowed">
                                    Menunggu Diambil
                                </button>

                                {{-- BORROWED --}}
                            @elseif ($borrow->status === 'borrowed')
                                <button
                                    class="flex-1 bg-gray-200 px-6 py-2 h-10 text-gray-600 rounded-xl font-semibold cursor-not-allowed">
                                    Sedang Dipinjam
                                </button>
                            @endif

                            {{-- STOK HABIS --}}
                        @elseif ($book->stock <= 0)
                            <button class="flex-1 px-6 py-2 h-10 bg-gray-200 text-gray-500 rounded-xl cursor-not-allowed">
                                Stok Habis
                            </button>

                            {{-- TERSEDIA --}}
                        @else
                            <form action="{{ route('borrow.store', $book->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button
                                    class="w-full px-6 py-2 h-10 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-semibold">
                                    Pinjam
                                </button>
                            </form>
                        @endif

                        @if ($book->ebook_file)
                            <a href="{{ asset('storage/' . $book->ebook_file) }}" target="_blank"
                                class="w-full sm:w-auto px-6 py-2 h-10 bg-green-600 text-white rounded-xl font-semibold flex items-center justify-center">
                                Baca Ebook
                            </a>
                        @endif

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
