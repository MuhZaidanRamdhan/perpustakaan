<div class="h-full bg-white">

    {{-- HEADER SIDEBAR --}}
    <div class="p-5 flex justify-between items-center border-b">
        <span class="font-bold text-lg">📚 Admin</span>

        {{-- CLOSE BUTTON (mobile) --}}
        <button @click="open = false" class="lg:hidden text-gray-500 text-lg">
            ✕
        </button>
    </div>

    {{-- MENU --}}
    <nav class="p-4 space-y-2">

        <a @click="open = false" href="{{ route('admin.dashboard') }}"
            class="block px-4 py-2 rounded text-sm
           {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500 text-white' : 'hover:bg-gray-100' }}">
            Dashboard
        </a>

        <a @click="open = false" href="{{ route('admin.categories.index') }}"
            class="block px-4 py-2 rounded text-sm
           {{ request()->routeIs('admin.categories.index') ? 'bg-blue-500 text-white' : 'hover:bg-gray-100' }}">
            Kategori
        </a>

        <a @click="open = false" href="{{ route('admin.books.index') }}"
            class="block px-4 py-2 rounded text-sm
           {{ request()->routeIs('admin.books.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-100' }}">
            Buku
        </a>

        <a @click="open = false" href="{{ route('admin.borrowings.index') }}"
            class="block px-4 py-2 rounded text-sm
           {{ request()->routeIs('admin.borrowings.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-100' }}">
            Peminjaman
        </a>

        <a @click="open = false" href="{{ route('Home') }}"
            class="block px-4 py-2 rounded text-sm
           {{ request()->routeIs('Home') ? 'bg-blue-500 text-white' : 'hover:bg-gray-100' }}">
            Beranda
        </a>

    </nav>

</div>
