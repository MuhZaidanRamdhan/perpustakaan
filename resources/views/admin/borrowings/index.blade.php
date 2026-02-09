@extends('admin.layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Peminjaman</h1>

<div class="bg-white rounded shadow">
    <table class="w-full text-sm">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3 text-left">User</th>
            <th class="p-3 text-left">Buku</th>
            <th class="p-3 text-center">Status</th>
            <th class="p-3 text-center">Tgl Pinjam</th>
            <th class="p-3 text-center">Tgl Kembali</th>
            <th class="p-3 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrowings as $borrow)
        <tr class="border-t">
            <td class="p-3">{{ $borrow->user->name }}</td>
            <td class="p-3">{{ $borrow->book->title }}</td>

            <td class="p-3 text-center">
                <span class="px-2 py-1 rounded text-xs
                    @if($borrow->status=='pending') bg-yellow-100 text-yellow-700
                    @elseif($borrow->status=='approved') bg-green-100 text-green-700
                    @else bg-gray-200 text-gray-700 @endif">
                    {{ ucfirst($borrow->status) }}
                </span>
            </td>

            <td class="p-3 text-center">
                {{ $borrow->created_at->format('d M Y') }}
            </td>

            <td class="p-3 text-center">
                {{ $borrow->returned_at
                    ? $borrow->returned_at->format('d M Y')
                    : '-' }}
            </td>

           <td class="p-3 text-center space-x-2">

            {{-- PENDING -> APPROVE --}}
            @if($borrow->status === 'pending')
                <form action="{{ route('admin.borrowings.approve', $borrow) }}"
                    method="POST" class="inline">
                    @csrf
                    <button class="text-blue-600 hover:underline">
                        Approve
                    </button>
                </form>
            @endif

            {{-- APPROVED -> RETURN --}}
            @if($borrow->status === 'approved')
                <form action="{{ route('admin.borrowings.return', $borrow) }}"
                    method="POST" class="inline">
                    @csrf
                    <button class="text-green-600 hover:underline">
                        Return
                    </button>
                </form>
            @endif

            {{-- DELETE (SELALU ADA) --}}
            <form action="{{ route('admin.borrowings.destroy', $borrow) }}"
                method="POST" class="inline"
                onsubmit="return confirm('Yakin hapus data?')">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:underline">
                    Hapus
                </button>
            </form>

        </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection