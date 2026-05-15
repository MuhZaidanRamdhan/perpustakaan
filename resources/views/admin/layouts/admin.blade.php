<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: none !important;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .admin-main {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 0;
            /* penting! cegah overflow horizontal */
        }

        .admin-content {
            flex: 1;
        }
    </style>
</head>

<body class="bg-gray-100 antialiased text-gray-800">

    <div x-data="{ open: false }" class="admin-wrapper">

        {{-- SIDEBAR --}}
        <aside
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r transform transition duration-200 lg:translate-x-0"
            :class="open ? 'translate-x-0' : '-translate-x-full'" x-cloak>
            @include('admin.partials.sidebar')
        </aside>

        {{-- MAIN CONTENT --}}
        <div class="admin-main lg:ml-64">

            @include('admin.partials.header')

            <main class="admin-content p-4 md:p-6">
                <div class="overflow-x-auto">
                    @yield('content')
                </div>
            </main>

            @include('admin.partials.footer')
        </div>

        {{-- Overlay mobile --}}
        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/50 z-40 lg:hidden" x-cloak></div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}"
            })
        </script>
    @endif
</body>

</html>
