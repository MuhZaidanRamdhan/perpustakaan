<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">

        {{-- Header --}}
        @include('admin.partials.header')

        {{-- Page Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
