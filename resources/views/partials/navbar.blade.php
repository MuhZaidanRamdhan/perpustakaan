<div x-data="{ open: false }"
    class="w-full flex justify-center sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-sky-100 shadow-sm">

    <div class="max-w-[1200px] w-full px-4 sm:px-8">

        <header class="flex items-center justify-between py-4">

            {{-- Logo --}}
            <div class="flex items-center gap-3">
                <div class="size-10 flex items-center justify-center rounded-full bg-sky-100 text-sky-600">
                    <span class="material-symbols-outlined !text-[28px]">menu_book</span>
                </div>
                <h2 class="text-xl font-bold text-sky-600">
                    Perpustakaan Kita
                </h2>
            </div>

            {{-- Desktop Menu --}}
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-slate-600 hover:text-sky-600 font-bold" href={{ route('Home') }}>Beranda</a>
                <a class="text-slate-600 hover:text-sky-600 font-bold" href="{{ route('collection') }}">Koleksi</a>
                <a class="text-slate-600 hover:text-sky-600 font-bold" href="{{ route('Activities') }}">Aktivitas</a>
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <a class="text-slate-600 hover:text-sky-600 font-bold"
                        href="{{ route('admin.dashboard') }}">Admin</a>
                @endif
            </nav>

            {{-- Desktop Auth Section --}}
            <div class="hidden md:flex items-center gap-4">

                @guest
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-sky-600 font-semibold">
                        Masuk
                    </a>

                    <a href="{{ route('register') }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-slate-900 px-5 py-2 rounded-full font-bold shadow-md transition">
                        Daftar
                    </a>
                @endguest


                @auth
                    <div x-data="{ dropdown: false }" class="relative">

                        <button @click="dropdown = !dropdown"
                            class="flex items-center gap-2 font-semibold text-slate-700 hover:text-sky-600">

                            <span class="material-symbols-outlined text-2xl">
                                account_circle
                            </span>

                            {{ Auth::user()->name }}

                            <span class="material-symbols-outlined text-lg">
                                expand_more
                            </span>
                        </button>
                        {{-- Dropdown --}}
                        <div x-show="dropdown" @click.away="dropdown = false" x-transition
                            class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-lg border border-slate-100 p-2">
                            <div class="flex items-center gap-3 px-4 py-3 border-b border-slate-100">

                                <div
                                    class="w-12 h-12 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-lg flex-shrink-0">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>

                                <div class="min-w-0">
                                    <p class="text-sm font-bold text-slate-800 truncate">
                                        {{ auth()->user()->name }}
                                    </p>

                                    <p class="text-xs text-slate-500 truncate mt-1">
                                        {{ auth()->user()->email }}
                                    </p>
                                </div>
                            </div>

                            {{-- LOGOUT --}}
                            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-600 text-sm transition">

                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[18px]">
                                            logout
                                        </span>
                                        Keluar
                                    </div>

                                </button>
                            </form>

                        </div>

                    </div>
                @endauth

            </div>

            {{-- Hamburger (Mobile) --}}
            <button @click="open = !open" class="md:hidden text-slate-700">
                <span class="material-symbols-outlined text-3xl">
                    menu
                </span>
            </button>

        </header>

        {{-- Mobile Menu --}}
        <div x-show="open" x-transition class="md:hidden pb-4">

            <div class="flex flex-col gap-4 pt-4 border-t border-slate-200">

                <a class="text-slate-600 hover:text-sky-600 font-bold" href="/">Beranda</a>
                <a class="text-slate-600 hover:text-sky-600 font-bold" href="{{ route('collection') }}">Koleksi</a>
                <a class="text-slate-600 hover:text-sky-600 font-bold" href="{{ route('Activities') }}">Aktivitas</a>

                <div class="border-t pt-4 flex flex-col gap-3">

                    @guest
                        <a href="{{ route('login') }}"
                            class="bg-yellow-400 hover:bg-yellow-500 text-slate-900 px-5 py-2 rounded-full font-bold text-center">
                            Masuk
                        </a>

                        <a href="{{ route('register') }}"
                            class="bg-yellow-400 hover:bg-yellow-500 text-slate-900 px-5 py-2 rounded-full font-bold text-center">
                            Daftar
                        </a>
                    @endguest


                    @auth
                        <div class="flex flex-col gap-4 pt-4 border-t border-slate-100">

                            {{-- USER INFO --}}
                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold flex-shrink-0">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>

                                <div class="min-w-0">
                                    <p class="font-semibold text-slate-700 truncate">
                                        {{ Auth::user()->name }}
                                    </p>

                                    <p class="text-sm text-slate-500 truncate">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                            </div>

                            {{-- LOGOUT --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 text-red-600 font-semibold py-2 rounded-xl hover:bg-red-50 transition">

                                    <span class="material-symbols-outlined text-[18px]">
                                        logout
                                    </span>

                                    Keluar
                                </button>
                            </form>

                        </div>
                    @endauth

                </div>

            </div>

        </div>

    </div>
</div>
