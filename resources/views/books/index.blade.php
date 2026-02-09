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
        <table class="w-full border">
            <tr class="bg-gray-100">
                <th>Judul</th>
                <th>Penulis</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>

            @foreach ($books as $book)
            @if($books->isEmpty())
                <tr>
                    <td colspan="4" class="text-center p-4 text-gray-500">
                        Belum ada buku
                    </td>
                </tr>
            @endif
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                      <form action="{{ route('borrow.store', $book) }}" method="POST">
                          @csrf
                          <button class="bg-blue-500 px-3 py-1 rounded">
                              Pinjam
                          </button>
                      </form>
                  </td>
                  @if($book->ebook_file)
                <td>
                  <button class="bg-green-500 text-white px-2">Baca</button>
                </td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
