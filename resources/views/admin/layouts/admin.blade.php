<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Paksa body tidak boleh kaku tingginya */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body class="bg-gray-100 antialiased text-gray-800">

    <div x-data="{ open: false }">
        {{-- SIDEBAR: Pake fixed biar konsisten --}}
        <aside
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r transform transition duration-200 lg:translate-x-0"
            :class="open ? 'translate-x-0' : '-translate-x-full'" x-cloak>
            @include('admin.partials.sidebar')
        </aside>

        {{-- MAIN CONTENT: Kasih margin-left 64 (w-64) supaya nggak ketumpuk sidebar --}}
        <div class="lg:ml-64 flex flex-col min-h-screen">

            @include('admin.partials.header')

            {{-- Bagian ini yang bakal nentuin tinggi --}}
            <main class="flex-grow p-4 md:p-6">
                <div class="max-w-full mx-auto bg-white rounded-lg shadow overflow-hidden">
                    {{-- overflow-x-auto wajib ada supaya tabel nggak ngerusak layout kalau kepanjangan --}}
                    <div class="overflow-x-auto p-4">
                        @yield('content')
                    </div>
                </div>
            </main>

            @include('admin.partials.footer')
        </div>

        {{-- Overlay buat mobile --}}
        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/50 z-40 lg:hidden" x-cloak></div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
