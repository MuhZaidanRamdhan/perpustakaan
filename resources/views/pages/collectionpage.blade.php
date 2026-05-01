@extends('layouts.layout')

@section('title', 'Collection')

@section('content')
    <main class="layout-container flex h-full grow flex-col items-center w-full">
        <div class="w-full max-w-[1400px] px-6 lg:px-8 py-10 flex flex-col gap-10">
            <div class="flex flex-col md:flex-row items-center justify-between min-h-[480px] bg-cover bg-center bg-no-repeat rounded-3xl p-8 md:p-12 relative overflow-hidden shadow-xl shadow-sky-200/50"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD-khyIKnefmWj0fqn55vC3UfE_14_BasfitlJyJkgmt9StKUxH0LEE0nDznyDsdiF3HkC2zKMKIOVDvNnGi4vPMuaSqhExHuOlG7a22DR5jKqTFCylYyBrToQ3T17C7ZU2AHRy758Fkotb7xV-35PIp8IkCTAJWpUx7e2zMJrcrqgEa62o5wY7LJaDlaoUVIjE7SyBwpp2VZqaiYb8sVN_-LoWKpdFRR9CymxjJFeJhhDoGHgAtjLtP3AnZ47rf4qgUmrO-GSaWik");'>

                {{-- Overlay --}}
                <div class="absolute inset-0 bg-sky-900/50 backdrop-blur-[2px]"></div>

                {{-- Content --}}
                <div class="flex flex-col gap-4 max-w-2xl relative z-10 text-white">

                    <div
                        class="inline-flex self-start items-center gap-2 px-4 py-2 rounded-full bg-white text-slate-900 shadow-sm font-bold">
                        <span class="animate-bounce">👋</span>
                        Halo Teman-teman!
                    </div>

                    <h1 class="text-4xl md:text-6xl font-black leading-tight tracking-tight drop-shadow-md">
                        Temukan Petualangan
                        <span class="underline decoration-wavy decoration-yellow-300">
                            Seru
                        </span>
                        Berikutnya!
                    </h1>

                    <p class="text-sky-100 text-xl font-medium max-w-lg mt-2 drop-shadow-sm">
                        Ayo jelajahi ribuan buku cerita, sains, dan komik yang siap menemani
                        hari-harimu belajar dan bermain.
                    </p>

                </div>

                {{-- Icon kanan --}}
                <div class="hidden md:block relative z-10">
                    <span
                        class="material-symbols-outlined text-[180px] text-yellow-300 rotate-12 drop-shadow-2xl opacity-90">
                        local_library
                    </span>
                </div>

            </div>
            <div id="collection-top"></div>
            <div
                class="flex flex-col lg:flex-row items-stretch lg:items-center gap-4 w-full lg:sticky lg:top-24 z-40 bg-background-light/95 py-6 backdrop-blur-sm">

                <form method="GET" action="{{ route('collection') }}#collection-top"
                    class="flex flex-col sm:flex-row w-full gap-3">

                    {{-- SEARCH --}}
                    <div class="flex-1">
                        <label
                            class="group flex items-center w-full h-14 rounded-2xl bg-white border-2 border-slate-200 
                                    focus-within:border-primary focus-within:ring-4 focus-within:ring-primary/20 
                                    transition-all shadow-md overflow-hidden">
                            <input name="search" value="{{ request('search') }}"
                                class="w-full h-full bg-transparent border-none px-4 text-lg"
                                placeholder="Cari judul buku atau pengarang..." />
                            <div class="pl-5 text-slate-400 flex items-center justify-center px-3">
                                <button class="material-symbols-outlined text-2xl group-focus-within:text-primary">
                                    search
                                </button>
                            </div>
                        </label>
                    </div>

                    {{-- FILTER BUTTON --}}
                    <div class="flex gap-3 flex-wrap sm:flex-nowrap overflow-x-auto py-1">
                        @php
                            $category = request('category');
                        @endphp

                        {{-- SEMUA --}}
                        <a href="{{ route('collection') }}#collection-top"
                            class="flex h-14 items-center gap-2 px-5 whitespace-nowrap rounded-2xl font-semibold shadow-md transition
                            {{ !$category ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 hover:bg-slate-100' }}">

                            <span class="material-symbols-outlined text-[20px]">apps</span>
                            Semua
                        </a>

                        {{-- FIKSI --}}
                        <a href="{{ route('collection', ['category' => 'Fiksi']) }}#collection-top"
                            class="flex h-14 items-center gap-2 px-5 whitespace-nowrap rounded-2xl font-semibold shadow-md transition
                            {{ $category === 'Fiksi' ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 hover:bg-slate-100' }}">

                            <span class="material-symbols-outlined text-[20px]">menu_book</span>
                            Fiksi
                        </a>

                        {{-- NON FIKSI --}}
                        <a href="{{ route('collection', ['category' => 'Non Fiksi']) }}#collection-top"
                            class="flex h-14 items-center gap-2 px-5 whitespace-nowrap rounded-2xl font-semibold shadow-md transition
                             {{ $category === 'Non Fiksi' ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 hover:bg-slate-100' }}">

                            <span class="material-symbols-outlined text-[20px]">science</span>
                            Non Fiksi
                        </a>

                    </div>

                </form>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-8">

                @foreach ($books as $book)
                    <div class="group relative flex flex-col h-full bg-white rounded-3xl p-4 shadow-soft border">

                        {{-- CATEGORY --}}
                        {{-- <div class="absolute top-3 -right-3 z-10">
                            <span
                                class="px-3 py-1 rounded-full text-xs font-bold text-white
                                {{ $book->category->name == 'Fiksi' ? 'bg-tag-fun' : 'bg-tag-science' }}">
                                {{ $book->category->name }}
                            </span>
                        </div> --}}

                        {{-- IMAGE --}}
                        <div class="relative w-full aspect-[3/4] overflow-hidden rounded-2xl mb-4">

                            {{-- IMAGE --}}
                            <div class="absolute inset-0 bg-cover bg-center"
                                style="background-image: url('{{ $book->image ? asset('storage/' . $book->image) : 'https://picsum.photos/seed/' . $book->id . '/300/400' }}')">
                            </div>

                            {{-- STATUS (PINDAH KE SINI) --}}
                            @php
                                $borrow = $userBorrowings[$book->id] ?? null;
                            @endphp

                            <div class="absolute top-3 left-3 z-10">
                                @if ($borrow)
                                    <span
                                        class="px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-700 shadow">
                                        Dipinjam
                                    </span>
                                @elseif ($book->stock <= 0)
                                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-600 shadow">
                                        Habis
                                    </span>
                                @else
                                    <span
                                        class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-600 shadow">
                                        Tersedia
                                    </span>
                                @endif
                            </div>

                        </div>

                        {{-- CONTENT --}}
                        <div class="flex flex-col gap-2 flex-grow">
                            <h3 class="text-lg font-bold line-clamp-2 truncate leading-tight">
                                {{ $book->title }}
                            </h3>

                            <p class="text-sm text-gray-500 h-[24px]">
                                {{ $book->author }}
                            </p>
                        </div>
                        @php
                            $borrow = $userBorrowings[$book->id] ?? null;
                        @endphp
                        {{-- ACTION --}}
                        <div class="mt-auto pt-4 flex gap-2">

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
                                        class="flex-1 h-10 bg-orange-100 text-orange-700 rounded-xl font-semibold cursor-not-allowed">
                                        Menunggu Diambil
                                    </button>

                                    {{-- BORROWED --}}
                                @elseif ($borrow->status === 'borrowed')
                                    <button
                                        class="flex-1 h-10 bg-gray-200 text-gray-600 rounded-xl font-semibold cursor-not-allowed">
                                        Sedang Dipinjam
                                    </button>
                                @endif

                                {{-- STOK HABIS --}}
                            @elseif ($book->stock <= 0)
                                <button class="flex-1 h-10 bg-gray-200 text-gray-500 rounded-xl cursor-not-allowed">
                                    Stok Habis
                                </button>

                                {{-- TERSEDIA --}}
                            @else
                                <form action="{{ route('borrow.store', $book->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    <button
                                        class="w-full h-10 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-semibold">
                                        Pinjam
                                    </button>
                                </form>
                            @endif

                            {{-- READ --}}
                            @if ($book->ebook_file)
                                <a href="{{ asset('storage/' . $book->ebook_file) }}" target="_blank"
                                    class="w-10 h-10 bg-green-600 text-white rounded-xl flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">
                                        menu_book
                                    </span>
                                </a>
                            @endif

                        </div>

                    </div>
                @endforeach
            </div>
            @if ($books->hasPages())
                <div class="flex items-center justify-center gap-4 py-8">

                    {{-- PREVIOUS --}}
                    @if ($books->onFirstPage())
                        <span
                            class="flex size-12 items-center justify-center rounded-2xl bg-gray-100 text-gray-400 cursor-not-allowed">
                            <span class="material-symbols-outlined text-2xl">chevron_left</span>
                        </span>
                    @else
                        <a href="{{ $books->previousPageUrl() }}#collection-top"
                            class="flex size-12 items-center justify-center rounded-2xl bg-white border-2 border-slate-100 hover:border-primary text-slate-500 hover:text-primary transition-all shadow-sm">
                            <span class="material-symbols-outlined text-2xl">chevron_left</span>
                        </a>
                    @endif


                    {{-- PAGE NUMBERS --}}
                    <div class="flex items-center gap-2 bg-white px-2 py-1 rounded-2xl border-2 border-slate-100">

                        @php
                            $start = max($books->currentPage() - 2, 1);
                            $end = min($books->currentPage() + 2, $books->lastPage());
                        @endphp

                        {{-- FIRST PAGE --}}
                        @if ($start > 1)
                            <a href="{{ $books->url(1) }}#collection-top"
                                class="flex size-10 items-center justify-center rounded-xl text-slate-500 hover:bg-slate-100 font-bold">
                                1
                            </a>

                            @if ($start > 2)
                                <span class="text-slate-300 font-bold px-1">...</span>
                            @endif
                        @endif


                        {{-- MAIN RANGE --}}
                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $books->currentPage())
                                <span
                                    class="flex size-10 items-center justify-center rounded-xl bg-primary text-white font-bold shadow-md">
                                    {{ $i }}
                                </span>
                            @else
                                <a href="{{ $books->url($i) }}#collection-top"
                                    class="flex size-10 items-center justify-center rounded-xl text-slate-500 hover:bg-slate-100 font-bold transition">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor


                        {{-- LAST PAGE --}}
                        @if ($end < $books->lastPage())
                            @if ($end < $books->lastPage() - 1)
                                <span class="text-slate-300 font-bold px-1">...</span>
                            @endif

                            <a href="{{ $books->url($books->lastPage()) }}#collection-top"
                                class="flex size-10 items-center justify-center rounded-xl text-slate-500 hover:bg-slate-100 font-bold">
                                {{ $books->lastPage() }}
                            </a>
                        @endif

                    </div>


                    {{-- NEXT --}}
                    @if ($books->hasMorePages())
                        <a href="{{ $books->nextPageUrl() }}#collection-top"
                            class="flex size-12 items-center justify-center rounded-2xl bg-white border-2 border-slate-100 hover:border-primary text-slate-500 hover:text-primary transition-all shadow-sm">
                            <span class="material-symbols-outlined text-2xl">chevron_right</span>
                        </a>
                    @else
                        <span
                            class="flex size-12 items-center justify-center rounded-2xl bg-gray-100 text-gray-400 cursor-not-allowed">
                            <span class="material-symbols-outlined text-2xl">chevron_right</span>
                        </span>
                    @endif

                </div>
            @endif
        </div>
    </main>
@endsection
