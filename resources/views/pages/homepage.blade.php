@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <div class="flex flex-1 justify-center py-5 w-full bg-background-soft">
        <div class="layout-content-container flex flex-col max-w-[1200px] flex-1 px-4 sm:px-8">

            <div class="@container mb-12">
                <div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat rounded-3xl items-center justify-center p-8 relative overflow-hidden group shadow-xl shadow-sky-200/50"
                    data-alt="Illustration of diverse students reading together in a bright library"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD-khyIKnefmWj0fqn55vC3UfE_14_BasfitlJyJkgmt9StKUxH0LEE0nDznyDsdiF3HkC2zKMKIOVDvNnGi4vPMuaSqhExHuOlG7a22DR5jKqTFCylYyBrToQ3T17C7ZU2AHRy758Fkotb7xV-35PIp8IkCTAJWpUx7e2zMJrcrqgEa62o5wY7LJaDlaoUVIjE7SyBwpp2VZqaiYb8sVN_-LoWKpdFRR9CymxjJFeJhhDoGHgAtjLtP3AnZ47rf4qgUmrO-GSaWik");'>
                    <div class="absolute inset-0 bg-sky-900/40 backdrop-blur-[2px]"></div>
                    <div class="relative z-10 flex flex-col gap-6 text-center max-w-3xl items-center">
                        <span
                            class="inline-block px-4 py-1.5 rounded-full bg-accent text-slate-900 text-sm font-bold tracking-wide shadow-sm">
                            Ayo Membaca!
                        </span>
                        <h1
                            class="text-white text-4xl sm:text-5xl md:text-6xl font-black leading-tight tracking-tight drop-shadow-md">
                            Halo, Selamat Datang di Perpustakaan Kita!
                        </h1>
                        <p
                            class="text-sky-50 text-lg sm:text-xl font-medium leading-relaxed max-w-xl mx-auto drop-shadow-sm font-body">
                            Temukan petualangan seru di setiap halaman buku.
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12">

                {{-- KOLEKSI --}}
                <a class="flex items-center gap-4 p-6 rounded-2xl bg-white border border-sky-100 shadow-sm hover:shadow-md hover:border-sky-200 transition-all group"
                    href="/collection#collection-top">

                    <div
                        class="size-16 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined !text-[32px]">
                            menu_book
                        </span>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-sky-600 transition-colors">
                            Jelajahi Koleksi
                        </h3>
                        <p class="text-slate-500 text-sm font-medium">
                            Temukan berbagai buku menarik untuk dipinjam atau dibaca.
                        </p>
                    </div>
                </a>

                {{-- AKTIVITAS --}}
                <a class="flex items-center gap-4 p-6 rounded-2xl bg-white border border-violet-100 shadow-sm hover:shadow-md hover:border-violet-200 transition-all group"
                    href="/activities">

                    <div
                        class="size-16 rounded-full bg-violet-100 text-violet-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined !text-[32px]">
                            history
                        </span>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold text-slate-800 group-hover:text-violet-600 transition-colors">
                            Aktivitas Pinjaman
                        </h3>
                        <p class="text-slate-500 text-sm font-medium">
                            Pantau status pinjaman dan lihat riwayat bukumu.
                        </p>
                    </div>
                </a>

            </div>
            <div class="flex flex-col gap-8 mb-16">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-8 rounded-full bg-accent"></div>
                        <h2 class="text-slate-800 text-2xl font-bold leading-tight tracking-tight">Rekomendasi
                            Minggu Ini</h2>
                    </div>
                    <a class="text-sky-600 hover:text-sky-700 text-sm font-bold flex items-center gap-1 group bg-sky-50 px-3 py-1.5 rounded-full hover:bg-sky-100 transition-colors"
                        href="/collection#collection-top">
                        Lihat Semua
                        <span
                            class="material-symbols-outlined !text-[18px] transition-transform group-hover:translate-x-1">arrow_forward</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">

                    @foreach ($randomBooks as $book)
                        <div class="group flex flex-col gap-3 cursor-pointer">

                            {{-- IMAGE --}}
                            <div
                                class="w-full aspect-[2/3] bg-slate-100 rounded-xl overflow-hidden relative shadow-sm border border-slate-100 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg group-hover:shadow-sky-100">

                                <div class="w-full h-full bg-cover bg-center transform group-hover:scale-105 transition-transform duration-500"
                                    style="background-image: url('{{ $book->image ? asset('storage/' . $book->image) : 'https://picsum.photos/seed/' . $book->id . '/300/400' }}')">
                                </div>
                            </div>

                            {{-- CONTENT --}}
                            <div class="space-y-1 px-1">
                                <h3
                                    class="text-slate-800 text-base font-bold leading-tight truncate group-hover:text-sky-600 transition-colors">
                                    {{ $book->title }}
                                </h3>

                                <p class="text-slate-500 text-sm font-medium truncate">
                                    {{ $book->author }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="mb-16">
                <div class="flex items-center justify-between px-2 pb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-8 rounded-full bg-sky-400"></div>
                        <h2 class="text-slate-800 text-2xl font-bold leading-tight tracking-tight">Jelajahi
                            Kategori</h2>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    {{-- FIKSI --}}
                    <a href="{{ route('collection', ['category' => 'Fiksi']) }}#collection-top"
                        class="group flex flex-col items-center justify-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-md hover:scale-[1.02] transition-all border border-slate-100 hover:border-sky-200">
                        <div
                            class="p-4 bg-sky-50 rounded-full mb-4 text-sky-500 shadow-sm group-hover:bg-sky-500 group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined !text-[32px]">
                                auto_stories
                            </span>
                        </div>

                        <span class="text-slate-800 font-bold text-lg">
                            Fiksi
                        </span>

                        <p class="text-sm text-slate-500 text-center mt-2">
                            Novel, cerita, dan buku imajinatif seru lainnya.
                        </p>
                    </a>

                    {{-- NON FIKSI --}}
                    <a href="{{ route('collection', ['category' => 'Non Fiksi']) }}#collection-top"
                        class="group flex flex-col items-center justify-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-md hover:scale-[1.02] transition-all border border-slate-100 hover:border-emerald-200">
                        <div
                            class="p-4 bg-emerald-50 rounded-full mb-4 text-emerald-500 shadow-sm group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined !text-[32px]">
                                school
                            </span>
                        </div>

                        <span class="text-slate-800 font-bold text-lg">
                            Non Fiksi
                        </span>

                        <p class="text-sm text-slate-500 text-center mt-2">
                            Buku edukasi, pengetahuan, dan wawasan baru.
                        </p>
                    </a>

                </div>
            </div>
        </div>
    </div>

@endsection
