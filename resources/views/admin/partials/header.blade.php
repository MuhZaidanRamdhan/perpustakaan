<header class="flex justify-between items-center bg-white px-4 md:px-6 py-4 border-b sticky top-0 z-30">

    {{-- LEFT --}}
    <div class="flex items-center gap-3">

        {{-- hamburger --}}
        <button @click="open = !open"
            class="lg:hidden w-10 h-10 rounded-xl hover:bg-gray-100 flex items-center justify-center text-gray-600">
            ☰
        </button>

        <div>
            <h1 class="text-lg md:text-2xl font-bold text-slate-800">
                @yield('title', 'Admin')
            </h1>

            <p class="hidden md:block text-sm text-slate-500">
                Kelola sistem perpustakaan
            </p>
        </div>
    </div>

    {{-- RIGHT --}}
    <div class="flex items-center gap-4">

        {{-- user info --}}
        <div class="hidden sm:flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-2xl">

            {{-- avatar --}}
            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="text-left">
                <p class="text-sm font-semibold text-slate-800">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-slate-500 capitalize">
                    {{ auth()->user()->role }}
                </p>
            </div>
        </div>

        {{-- logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="px-4 py-2 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 font-medium text-sm transition">
                Logout
            </button>
        </form>

    </div>
</header>
