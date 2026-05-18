@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="flex justify-between mb-5">
        <h1 class="text-2xl font-bold">Users</h1>

        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-xl">
            + Tambah User
        </a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="p-3">Nama</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Role</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr class="border-t">
                        <td class="p-3 text-center">{{ $user->name }}</td>
                        <td class="p-3 text-center">{{ $user->email }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('admin.users.updateRole', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <select name="role" onchange="this.form.submit()"
                                    class="w-28 rounded-full px-3 py-2 text-sm font-medium border-0
                                    {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-600' : 'bg-green-100 text-green-600' }}">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>

                                    <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>
                                        Siswa
                                    </option>
                                </select>
                            </form>
                        </td>
                        <td class="p-3 text-center">
                            <a href="{{ route('admin.users.edit', $user) }}"
                                class="px-3 py-1 bg-blue-100 text-blue-600 rounded-lg text-sm font-medium">Edit</a>

                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="px-3 py-1 bg-red-100 text-red-600 rounded-lg text-sm font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6">
                            Data user tidak ada
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
