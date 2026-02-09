<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function store(Book $book)
    {
        // cek stok
        if ($book->stock <= 0) {
            return back()->with('error', 'Stok buku habis');
        }

        // cegah pinjam ganda
        $alreadyBorrow = Borrowing::where('user_id', auth()->id())
            ->where('book_id', $book->id)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($alreadyBorrow) {
            return back()->with('error', 'Kamu sudah meminjam / sedang menunggu buku ini');
        }

        Borrowing::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Permintaan peminjaman dikirim');
    }
}
