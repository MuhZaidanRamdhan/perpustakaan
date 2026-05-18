@extends('admin.layouts.admin')

@section('title', 'Tambah User')

@section('content')
    <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-sm border p-8">

        <h2 class="text-2xl font-bold text-slate-800 mb-6">
            Tambah User
        </h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-600 p-4 rounded-xl">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- Judul --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">Nama</label>
                <input type="text" name="name"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan Nama">
            </div>

            <div>
                <label class="block mb-2 font-medium text-slate-700">Email</label>
                <input type="email" name="email"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan Email">
            </div>

            <div>
                <label class="block mb-2 font-medium text-slate-700">Password</label>
                <input type="password" name="password"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan Password">
            </div>

            <div>
                <label class="block mb-2 font-medium text-slate-700">Role</label>
                <select name="role"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="admin">Admin</option>
                    <option value="siswa">Siswa</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                Simpan User
            </button>

        </form>
    </div>
@endsection
