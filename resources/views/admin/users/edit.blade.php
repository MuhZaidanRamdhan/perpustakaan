@extends('admin.layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl shadow-sm hover:bg-blue-50 transition">

            <span class="material-symbols-outlined text-[20px]">
                arrow_back
            </span>

            Kembali ke Daftar User
        </a>
    </div>
    <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-sm border p-8">

        <h2 class="text-2xl font-bold text-slate-800 mb-6">
            Edit User
        </h2>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-600 p-4 rounded-xl">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Link kembali --}}

        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Nama
                </label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan nama user">
            </div>

            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Email
                </label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan email user">
            </div>

            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Password
                </label>
                <input type="password" name="password"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan password baru (biarkan kosong jika tidak ingin mengganti password)">
            </div>

            <div>
                <label class="block mb-2 font-medium text-slate-700">
                    Role
                </label>
                <select name="role"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="siswa" {{ old('role', $user->role) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                </select>
            </div>

            {{-- BUTTON --}}
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                Update User
            </button>

        </form>
    </div>
@endsection
