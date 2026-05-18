<div class="h-full bg-white flex flex-col">

    {{-- HEADER --}}
    <div class="p-5 flex justify-between items-center border-b">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                <span class="material-symbols-outlined">
                    menu_book
                </span>
            </div>

            <div>
                <h2 class="font-bold text-lg text-slate-800">
                    Admin Panel
                </h2>
                <p class="text-xs text-slate-500">
                    Perpustakaan
                </p>
            </div>
        </div>

        {{-- close mobile --}}
        <button @click="open = false" class="lg:hidden w-8 h-8 rounded-lg hover:bg-gray-100 text-gray-500">
            ✕
        </button>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 p-4 space-y-2">

        <a @click="open = false" href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-blue-500 text-white shadow-md'
                : 'text-slate-600 hover:bg-slate-100' }}">
            <span class="material-symbols-outlined text-[20px]">dashboard</span>
            Dashboard
        </a>

        <a @click="open = false" href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition
            {{ request()->routeIs('admin.users.*')
                ? 'bg-blue-500 text-white shadow-md'
                : 'text-slate-600 hover:bg-slate-100' }}">
            <span class="material-symbols-outlined text-[20px]">person</span>
            User
        </a>

        <a @click="open = false" href="{{ route('admin.categories.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition
            {{ request()->routeIs('admin.categories.*')
                ? 'bg-blue-500 text-white shadow-md'
                : 'text-slate-600 hover:bg-slate-100' }}">
            <span class="material-symbols-outlined text-[20px]">category</span>
            Kategori
        </a>

        <a @click="open = false" href="{{ route('admin.books.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition
            {{ request()->routeIs('admin.books.*')
                ? 'bg-blue-500 text-white shadow-md'
                : 'text-slate-600 hover:bg-slate-100' }}">
            <span class="material-symbols-outlined text-[20px]">menu_book</span>
            Buku
        </a>

        <a @click="open = false" href="{{ route('admin.borrowings.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition
            {{ request()->routeIs('admin.borrowings.*')
                ? 'bg-blue-500 text-white shadow-md'
                : 'text-slate-600 hover:bg-slate-100' }}">
            <span class="material-symbols-outlined text-[20px]">library_books</span>
            Peminjaman
        </a>

        <a @click="open = false" href="{{ route('Home') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition
            text-slate-600 hover:bg-slate-100">
            <span class="material-symbols-outlined text-[20px]">home</span>
            Beranda
        </a>

    </nav>
</div>
