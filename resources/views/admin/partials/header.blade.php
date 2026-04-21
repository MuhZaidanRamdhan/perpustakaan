<header class="flex justify-between items-center bg-white px-4 md:px-6 py-4 border-b">

    <div class="flex items-center gap-3">

        {{-- HAMBURGER --}}
        <button @click="open = !open" class="lg:hidden text-gray-600 text-xl">
            ☰
        </button>

        <h1 class="text-base md:text-xl font-bold text-gray-800 truncate max-w-[150px] md:max-w-none">
            @yield('title', 'Admin')
        </h1>
    </div>

    <div class="flex items-center gap-3 md:gap-4">
        <div class="text-right hidden sm:block">
            <p class="text-sm font-medium text-gray-800">
                {{ auth()->user()->name }}
            </p>
            <p class="text-xs text-gray-500 capitalize">
                {{ auth()->user()->role }}
            </p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm text-red-600 hover:text-red-800 font-medium">
                Logout
            </button>
        </form>
    </div>

</header>
