<aside class="w-64 bg-white border-r">

    <div class="p-6 font-bold text-xl border-b">
        📚 Admin Perpus
    </div>

    <nav class="p-4 space-y-2">

        <a href="{{ route('admin.dashboard') }}"
           class="block px-4 py-2 rounded
           {{ request()->routeIs('admin.dashboard') 
                ? 'bg-blue-500 text-white' 
                : 'hover:bg-gray-100' }}">
            Dashboard
        </a>

        <a href="{{ route('admin.books.index') }}"
           class="block px-4 py-2 rounded
           {{ request()->routeIs('admin.books.*') 
                ? 'bg-blue-500 text-white' 
                : 'hover:bg-gray-100' }}">
            Buku
        </a>

        <a href="{{ route('admin.borrowings.index') }}"
           class="block px-4 py-2 rounded
           {{ request()->routeIs('admin.borrowings.*') 
                ? 'bg-blue-500 text-white' 
                : 'hover:bg-gray-100' }}">
            Peminjaman
        </a>

    </nav>
</aside>
