<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Halaman Tidak Ditemukan</title>
</head>

<body>
    <div class="min-h-[80vh] flex items-center justify-center px-6 py-12 bg-background-light">
        <div class="max-w-2xl w-full bg-white rounded-3xl p-8 md:p-12 text-center">

            {{-- ICON --}}
            <div class="mx-auto mb-6 w-24 h-24 rounded-full bg-sky-100 flex items-center justify-center">
                <span class="material-symbols-outlined text-sky-600 text-5xl">
                    menu_book
                </span>
            </div>

            {{-- 404 TEXT --}}
            <h1 class="text-6xl md:text-7xl font-extrabold text-slate-800 tracking-tight mb-3 ">
                404
            </h1>

            <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-4">
                Halaman Tidak Ditemukan
            </h2>

            <p class="text-slate-500 text-lg leading-relaxed max-w-lg mx-auto mb-8">
                Ups... halaman yang kamu cari sepertinya sedang tidak tersedia
                atau bukunya sudah dipindahkan ke rak lain 📚
            </p>

            {{-- BUTTON ACTION --}}
            <div class="flex flex-col sm:flex-row justify-center gap-3">
                <a href="{{ route('Home') }}"
                    class="px-6 py-3 bg-blue-600 text-white rounded-2xl font-semibold hover:bg-blue-700 transition shadow-md">
                    Kembali ke Beranda
                </a>

                <a href="{{ route('collection') }}"
                    class="px-6 py-3 bg-white border border-slate-200 text-slate-700 rounded-2xl font-semibold hover:bg-slate-50 transition shadow-sm">
                    Lihat Koleksi
                </a>
            </div>

            {{-- DECORATION --}}
            <div class="mt-10 text-sm text-slate-400">
                Perpustakaan Kita • Temukan bacaan favoritmu
            </div>
        </div>
    </div>
</body>

</html>
