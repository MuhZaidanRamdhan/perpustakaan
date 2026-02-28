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
                <div class="w-full max-w-lg mt-4 relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <span
                            class="material-symbols-outlined text-slate-400 group-focus-within:text-sky-500 transition-colors">search</span>
                    </div>
                    <input
                        class="block w-full pl-12 pr-4 py-4 rounded-full border-none shadow-lg text-slate-900 focus:ring-4 focus:ring-accent/50 focus:outline-none text-lg transition-all"
                        placeholder="Cari judul buku, penulis, atau topik..." type="text" />
                    <button
                        class="absolute inset-y-1.5 right-1.5 bg-sky-500 hover:bg-sky-600 text-white rounded-full px-6 font-bold transition-colors">
                        Cari
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12">
        <a class="flex items-center gap-4 p-6 rounded-2xl bg-white border border-sky-100 shadow-sm hover:shadow-md hover:border-sky-200 transition-all group"
            href="#">
            <div
                class="size-16 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined !text-[32px]">stars</span>
            </div>
            <div>
                <h3 class="text-xl font-bold text-slate-800 group-hover:text-sky-600 transition-colors">
                    Buku Populer</h3>
                <p class="text-slate-500 text-sm font-medium">Lihat apa yang sedang ramai dibaca
                    teman-temanmu!</p>
            </div>
        </a>
        <a class="flex items-center gap-4 p-6 rounded-2xl bg-white border border-yellow-100 shadow-sm hover:shadow-md hover:border-yellow-200 transition-all group"
            href="#">
            <div
                class="size-16 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined !text-[32px]">new_releases</span>
            </div>
            <div>
                <h3 class="text-xl font-bold text-slate-800 group-hover:text-yellow-600 transition-colors">
                    Koleksi Terbaru</h3>
                <p class="text-slate-500 text-sm font-medium">Buku-buku baru yang baru saja mendarat di
                    rak.</p>
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
                href="#">
                Lihat Semua
                <span
                    class="material-symbols-outlined !text-[18px] transition-transform group-hover:translate-x-1">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            <div class="group flex flex-col gap-3 cursor-pointer">
                <div
                    class="w-full aspect-[2/3] bg-slate-100 rounded-xl overflow-hidden relative shadow-sm border border-slate-100 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg group-hover:shadow-sky-100">
                    <div class="w-full h-full bg-cover bg-center transform group-hover:scale-105 transition-transform duration-500"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBBhvEZKcbdVcj2RnSn1UabqWP1IpLHXw4F6LlAJYQT9HXU0I4eGS7OhMcQT0579ARpDWaNDRRNTx7Lsp6P1dAGyS63I2aDGB4DSQ7pXlPj-YqGNZCxElDRy8aCm6hg4NxlGJGz1UzNffltseLEkPWZRjvxrdETP8tj10SvGOxP6N7k59hbwo7p9EnJK9ztEO3AQrE6gy93cFO09v1fiMqQO-f731dNAOzCwGj7hkXK0F6EPSyH8Orl9pleHcDBjcgUd1zArapr7i8");'>
                    </div>
                </div>
                <div class="space-y-1 px-1">
                    <h3
                        class="text-slate-800 text-base font-bold leading-tight truncate group-hover:text-sky-600 transition-colors">
                        The Midnight Library</h3>
                    <p class="text-slate-500 text-sm font-medium truncate">Matt Haig</p>
                    <div
                        class="flex items-center gap-1 text-xs font-bold text-sky-600 bg-sky-50 px-2 py-1 rounded-full w-fit mt-1">
                        <span class="material-symbols-outlined !text-[14px]">check_circle</span>
                        Tersedia
                    </div>
                </div>
            </div>
            <div class="group flex flex-col gap-3 cursor-pointer">
                <div
                    class="w-full aspect-[2/3] bg-slate-100 rounded-xl overflow-hidden relative shadow-sm border border-slate-100 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg group-hover:shadow-sky-100">
                    <div class="w-full h-full bg-cover bg-center transform group-hover:scale-105 transition-transform duration-500"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAvPdKJoXjXTAhI5UkcwUpxDb8atE5GQHNNluI3aRpKugEwouJQlFIsu96wEEwqSoyRBLXajufpVQPYYMSvS6QDg-PDjg5kHi84ukjyqV1JMumv-wDcgp4xSuLL-nZfWTAxNyiP_CgY8i1AmKGCCrNV12j6fmeOvZxNV75MmzUhTl6NBumYy5FdG8L9IwcNp45zha4vvPWbB8OA0u5b_MZBbOAlX9m5ov7P2-ci15cHM1tj5ntI0VNItIAx6hIDH2cZo2uxVXktT6k");'>
                    </div>
                </div>
                <div class="space-y-1 px-1">
                    <h3
                        class="text-slate-800 text-base font-bold leading-tight truncate group-hover:text-sky-600 transition-colors">
                        Harry Potter</h3>
                    <p class="text-slate-500 text-sm font-medium truncate">J.K. Rowling</p>
                    <div
                        class="flex items-center gap-1 text-xs font-bold text-amber-600 bg-amber-50 px-2 py-1 rounded-full w-fit mt-1">
                        <span class="material-symbols-outlined !text-[14px]">schedule</span>
                        Antrian
                    </div>
                </div>
            </div>
            <div class="group flex flex-col gap-3 cursor-pointer">
                <div
                    class="w-full aspect-[2/3] bg-slate-100 rounded-xl overflow-hidden relative shadow-sm border border-slate-100 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg group-hover:shadow-sky-100">
                    <div class="w-full h-full bg-cover bg-center transform group-hover:scale-105 transition-transform duration-500"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA7HqH1liS0UIwMWWDuNNFcWmzIP9CWp4f9LuMXoUXV-ynZj-B4vZ_efkEJFCWUmDXME-XisLMYRs2meNB4H-kBXG9tpdsBlrXAeTBFPtVqHH-K7tjaPf2TF0eoTLSB1Q28kd56ahhZxPlAuxSBsaIuLYwLYORFEke_dR0blO67aFra9tBqNJSk4PJ3FjvTTQxFW7MLGhASk1lJVgc-qoE71y3pIyrFiWuleZBKqQxC7epUvRrx_zhwWC39-wVw1QlJv0BVba8t8fM");'>
                    </div>
                </div>
                <div class="space-y-1 px-1">
                    <h3
                        class="text-slate-800 text-base font-bold leading-tight truncate group-hover:text-sky-600 transition-colors">
                        Wonder</h3>
                    <p class="text-slate-500 text-sm font-medium truncate">R.J. Palacio</p>
                    <div
                        class="flex items-center gap-1 text-xs font-bold text-sky-600 bg-sky-50 px-2 py-1 rounded-full w-fit mt-1">
                        <span class="material-symbols-outlined !text-[14px]">check_circle</span>
                        Tersedia
                    </div>
                </div>
            </div>
            <div class="group flex flex-col gap-3 cursor-pointer">
                <div
                    class="w-full aspect-[2/3] bg-slate-100 rounded-xl overflow-hidden relative shadow-sm border border-slate-100 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg group-hover:shadow-sky-100">
                    <div class="w-full h-full bg-cover bg-center transform group-hover:scale-105 transition-transform duration-500"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCQcWqVUZEc_oEQgssHf9Ugjap3r6dz-Z8ukEc68gtHY_SQz4eFtFpjqqkJRjZGafee3kJgeW_prV09iG49wJ1N16KjtfumU-Vm1UmHY-4eN7WnWhnr2wyHLhJF_hzitIOIxJv8t1p4ypVr4TXuh1EyL4b1HjJ54s-WJKxjrSxfkg8-_5Nqh2TZeE59TOp42p0-o0zM0kebRHY4yU3l0hmCVLOrPmXox4w_bqnyVjbIJlE66KPMgnMoiFqAaXVIqX8NB9TVGVS2Ax4");'>
                    </div>
                </div>
                <div class="space-y-1 px-1">
                    <h3
                        class="text-slate-800 text-base font-bold leading-tight truncate group-hover:text-sky-600 transition-colors">
                        Matilda</h3>
                    <p class="text-slate-500 text-sm font-medium truncate">Roald Dahl</p>
                    <div
                        class="flex items-center gap-1 text-xs font-bold text-sky-600 bg-sky-50 px-2 py-1 rounded-full w-fit mt-1">
                        <span class="material-symbols-outlined !text-[14px]">check_circle</span>
                        Tersedia
                    </div>
                </div>
            </div>
            <div class="group flex flex-col gap-3 cursor-pointer hidden lg:flex">
                <div
                    class="w-full aspect-[2/3] bg-slate-100 rounded-xl overflow-hidden relative shadow-sm border border-slate-100 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg group-hover:shadow-sky-100">
                    <div class="w-full h-full bg-cover bg-center transform group-hover:scale-105 transition-transform duration-500"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD5nhWYW-8xy4MFdCiW24RFy8gl9oeVBxBEjN2nGCOHAPxCPm78TvSc7PvYu-qkj1qD7lGpRF92HwLRH9sKUphKpJ4T5TQCKNq8kaytgtFM6pa02Zk_yslMlYHFRYNoH-aSJHWKq34ljQtM0_tKCJsJMt3Aq__W4APRmPPc-GHAEWMV_VGsa4Mr_yirbhNN0vW9aSiC1JCOwtcfJXyDh1WoYLJMV65DqgqN6LK-7_oj00EhGpd_Y6qDc16k7zllrgSDmpVNDovBeNk");'>
                    </div>
                </div>
                <div class="space-y-1 px-1">
                    <h3
                        class="text-slate-800 text-base font-bold leading-tight truncate group-hover:text-sky-600 transition-colors">
                        The Little Prince</h3>
                    <p class="text-slate-500 text-sm font-medium truncate">Antoine de Saint-Exupéry</p>
                    <div
                        class="flex items-center gap-1 text-xs font-bold text-sky-600 bg-sky-50 px-2 py-1 rounded-full w-fit mt-1">
                        <span class="material-symbols-outlined !text-[14px]">check_circle</span>
                        Tersedia
                    </div>
                </div>
            </div>
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
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a class="group flex flex-col items-center justify-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-md hover:scale-[1.02] transition-all border border-slate-100 hover:border-sky-200"
                href="#">
                <div
                    class="p-4 bg-sky-50 rounded-full mb-4 text-sky-500 shadow-sm group-hover:bg-sky-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined !text-[32px]">auto_stories</span>
                </div>
                <span class="text-slate-800 font-bold text-lg">Cerita Fiksi</span>
            </a>
            <a class="group flex flex-col items-center justify-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-md hover:scale-[1.02] transition-all border border-slate-100 hover:border-sky-200"
                href="#">
                <div
                    class="p-4 bg-amber-50 rounded-full mb-4 text-amber-500 shadow-sm group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined !text-[32px]">school</span>
                </div>
                <span class="text-slate-800 font-bold text-lg">Pengetahuan</span>
            </a>
            <a class="group flex flex-col items-center justify-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-md hover:scale-[1.02] transition-all border border-slate-100 hover:border-sky-200"
                href="#">
                <div
                    class="p-4 bg-emerald-50 rounded-full mb-4 text-emerald-500 shadow-sm group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined !text-[32px]">rocket_launch</span>
                </div>
                <span class="text-slate-800 font-bold text-lg">Sains &amp; Alam</span>
            </a>
            <a class="group flex flex-col items-center justify-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-md hover:scale-[1.02] transition-all border border-slate-100 hover:border-sky-200"
                href="#">
                <div
                    class="p-4 bg-rose-50 rounded-full mb-4 text-rose-500 shadow-sm group-hover:bg-rose-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined !text-[32px]">history_edu</span>
                </div>
                <span class="text-slate-800 font-bold text-lg">Sejarah</span>
            </a>
        </div>
    </div>
</div>
</div>

@endsection
