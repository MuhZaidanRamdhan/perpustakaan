<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['user', 'book'])->latest()->get();
        return view('admin.borrowings.index', compact('borrowings'));
    }

    public function myBorrowings()
    {
        $borrowings = Borrowing::with('book')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }


    public function approve(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'pending') {
            return back()->with('error', 'Hanya peminjaman pending yang bisa di-approve.');
        }

        if ($borrowing->book->stock <= 0) {
            return back()->with('error', 'Stok buku habis.');
        }

        $borrowing->update([
            'status' => 'approved',
            'borrowed_at' => now(),
        ]);

        $borrowing->book->decrement('stock');

        return back()->with('success', 'Peminjaman berhasil di-approve.');
    }


    public function return(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'approved') {
            return back()->with('error', 'Hanya buku approved yang bisa dikembalikan.');
        }

        $borrowing->update([
            'status' => 'returned',
            'returned_at' => now(),
        ]);

        $borrowing->book->increment('stock');

        return back()->with('success', 'Buku berhasil dikembalikan.');
    }


    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status === 'approved') {
            return back()->with('error', 'Tidak bisa hapus peminjaman yang masih aktif.');
        }

        $borrowing->delete();

        return back()->with('success', 'Data peminjaman dihapus.');
    }


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
