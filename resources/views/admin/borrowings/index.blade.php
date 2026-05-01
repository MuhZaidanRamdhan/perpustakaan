@extends('admin.layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-semibold mb-6">Peminjaman</h1>

        @if (session('success'))
            <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse min-w-[600px]">
                    <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                        <tr>
                            <th class="px-4 py-3 text-left">User</th>
                            <th class="px-4 py-3 text-left">Buku</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-center">Tgl Pinjam</th>
                            <th class="px-4 py-3 text-center">Batas Kembali</th>
                            <th class="px-4 py-3 text-center">Dikembalikan</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @foreach ($borrowings as $borrow)
                            @php
                                $isLate = $borrow->due_date && !$borrow->returned_at && now()->gt($borrow->due_date);
                            @endphp

                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $borrow->user->name }}</td>
                                <td class="px-4 py-3">{{ $borrow->book->title }}</td>

                                <td class="px-4 py-3 text-center">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs
                            @if ($borrow->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($borrow->status == 'approved') bg-blue-100 text-blue-700
                            @elseif($borrow->status == 'borrowed' && $isLate) bg-red-100 text-red-700
                            @elseif($borrow->status == 'borrowed') bg-green-100 text-green-700
                            @elseif($borrow->status == 'returned') bg-gray-200 text-gray-700 @endif">
                                        {{ $isLate ? 'Overdue' : ucfirst($borrow->status) }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    {{ $borrow->borrowed_at ? \Carbon\Carbon::parse($borrow->borrowed_at)->format('d M Y') : '-' }}
                                </td>

                                {{-- KOLOM PINTAR --}}
                                <td class="px-4 py-3 text-center">
                                    @if ($borrow->status === 'approved')
                                        <form action="{{ route('admin.borrowings.borrow', $borrow) }}" method="POST"
                                            class="flex justify-center gap-2">
                                            @csrf
                                            <input type="date" name="due_date" required
                                                class="border rounded px-2 py-1 text-xs">
                                            <button class="bg-green-500 text-white px-3 py-1 rounded text-xs">
                                                Simpan
                                            </button>
                                        </form>
                                    @else
                                        {{ $borrow->due_date ? \Carbon\Carbon::parse($borrow->due_date)->format('d M Y') : '-' }}
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-center">
                                    {{ $borrow->returned_at ? \Carbon\Carbon::parse($borrow->returned_at)->format('d M Y') : '-' }}
                                </td>

                                <td class="px-4 py-3">
                                    <div class="flex justify-center items-center gap-2 flex-wrap">

                                        @if ($borrow->status === 'pending')
                                            <form action="{{ route('admin.borrowings.approve', $borrow) }}" method="POST">
                                                @csrf
                                                <button class="bg-blue-500 text-white px-2 py-1 rounded text-xs">
                                                    Approve
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.borrowings.reject', $borrow) }}" method="POST">
                                                @csrf
                                                <button class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                                    Reject
                                                </button>
                                            </form>
                                        @endif

                                        @if ($borrow->status === 'borrowed')
                                            <form action="{{ route('admin.borrowings.return', $borrow) }}" method="POST">
                                                @csrf
                                                <button class="bg-green-500 text-white px-2 py-1 rounded text-xs">
                                                    Return
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('admin.borrowings.destroy', $borrow) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
