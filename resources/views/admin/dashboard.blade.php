@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-500">Total Buku</p>
        <p class="text-2xl font-bold">{{ $totalBooks }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-500">Peminjaman Aktif</p>
        <p class="text-2xl font-bold">{{ $activeBorrowings }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-500">User</p>
        <p class="text-2xl font-bold">{{ $totalUsers }}</p>
    </div>
</div>
@endsection
