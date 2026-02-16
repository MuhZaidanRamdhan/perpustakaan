<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Riwayat Peminjaman Saya</h1>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Buku</th>
                        <th class="p-3 text-center">Status</th>
                        <th class="p-3 text-center">Tgl Pinjam</th>
                        <th class="p-3 text-center">Tgl Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($borrowings as $borrow)
                        <tr class="border-t">
                            <td class="p-3">
                                {{ $borrow->book->title }}
                            </td>

                            <td class="p-3 text-center">
                                @if($borrow->status === 'pending')
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs">
                                        Pending
                                    </span>
                                @elseif($borrow->status === 'approved')
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">
                                        Approved
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded text-xs">
                                        Returned
                                    </span>
                                @endif
                            </td>

                            <td class="p-3 text-center">
                                {{ $borrow->borrowed_at
                                    ? \Carbon\Carbon::parse($borrow->borrowed_at)->format('d M Y')
                                    : '-' }}
                            </td>

                            <td class="p-3 text-center">
                                {{ $borrow->returned_at
                                    ? \Carbon\Carbon::parse($borrow->returned_at)->format('d M Y')
                                    : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Belum ada riwayat peminjaman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
