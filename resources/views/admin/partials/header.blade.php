<header class="flex justify-between items-center bg-white px-6 py-4 border-b mb-6">
    <h1 class="text-xl font-semibold text-gray-800">
        @yield('title', 'Admin')
    </h1>

    <div class="flex items-center gap-4">
        <div class="text-right">
            <p class="text-sm font-medium text-gray-800">
                {{ auth()->user()->name }}
            </p>
            <p class="text-xs text-gray-500 capitalize">
                {{ auth()->user()->role }}
            </p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="text-sm text-red-600 hover:text-red-800 font-medium"
            >
                Logout
            </button>
        </form>
    </div>
</header>
