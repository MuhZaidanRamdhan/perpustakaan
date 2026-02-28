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
                <a class="text-slate-600 hover:text-sky-600 font-bold" href="{{ route('Home') }}">Beranda</a>
                <a class="text-slate-600 hover:text-sky-600 font-bold" href="{{ route('Collection') }}">Koleksi</a>
                <a class="text-slate-600 hover:text-sky-600 font-bold" href="{{ route('Activities') }}">Aktivitas</a>
            </nav>

            {{-- Desktop Auth Section --}}
            <div class="hidden md:flex items-center gap-4">

                @guest
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-sky-600 font-semibold">
                        Sign In
                    </a>

                    <a href="{{ route('register') }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-slate-900 px-5 py-2 rounded-full font-bold shadow-md transition">
                        Register
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
                            class="absolute right-0 mt-3 w-44 bg-white rounded-xl shadow-lg border border-slate-100 p-2">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 rounded-lg hover:bg-red-50 hover:text-red-600 text-sm transition">
                                    Logout
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
                <a class="text-slate-600 hover:text-sky-600 font-bold" href="/koleksi">Koleksi</a>
                <a class="text-slate-600 hover:text-sky-600 font-bold" href="/aktivitas">Aktivitas</a>

                <div class="border-t pt-4 flex flex-col gap-3">

                    @guest
                        <a href="{{ route('login') }}" class="text-slate-600 hover:text-sky-600 font-semibold">
                            Sign In
                        </a>

                        <a href="{{ route('register') }}"
                            class="bg-yellow-400 hover:bg-yellow-500 text-slate-900 px-5 py-2 rounded-full font-bold text-center">
                            Register
                        </a>
                    @endguest


                    @auth
                        <div class="flex flex-col gap-2">

                            <p class="font-semibold text-slate-700">
                                {{ Auth::user()->name }}
                            </p>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-red-600 font-semibold text-left">
                                    Logout
                                </button>
                            </form>

                        </div>
                    @endauth

                </div>

            </div>

        </div>

    </div>
</div>
