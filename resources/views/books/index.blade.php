<x-app-layout>
    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Daftar Buku</h1>

        @if(session('success'))
              <div class="bg-green-100 text-green-700 p-2 mb-3">
                  {{ session('success') }}
              </div>
          @endif

          @if(session('error'))
              <div class="bg-red-100 text-red-700 p-2 mb-3">
                  {{ session('error') }}
              </div>
          @endif

        <div class="mb-6 flex gap-2">

            {{-- Default (Semua Buku) --}}
            <a href="{{ route('books.index') }}"
            class="px-4 py-2 rounded
            {{ request('category') ? 'bg-gray-200' : 'bg-blue-500 text-white' }}">
                Semua
            </a>

            @foreach($categories as $category)
                <a href="{{ route('books.index', ['category' => $category->id]) }}"
                class="px-4 py-2 rounded
                {{ request('category') == $category->id
                        ? 'bg-blue-500 text-white'
                        : 'bg-gray-200 hover:bg-gray-300' }}">
                    {{ $category->name }}
                </a>
            @endforeach

        </div>


        <table class="w-full border">
            <tr class="bg-gray-100">
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>

            @if($userbooks->isEmpty())
            <tr>
                <td colspan="5" class="text-center p-4 text-gray-500">
                    Belum ada buku
                </td>
            </tr>
            @else
            @foreach ($userbooks as $book)
                <tr class="text-center">
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name ?? '-' }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <form action="{{ route('borrow.store', $book) }}" method="POST">
                            @csrf
                            <button class="bg-blue-500 text-white px-3 py-1 rounded">
                                Pinjam
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @endif
        </table>
    </div>
</x-app-layout>
