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
        $borrowing->update([
            'status' => 'approved',
        ]);

        return back()->with('success', 'Pengajuan disetujui');
    }

    public function reject(Borrowing $borrowing)
    {
        $borrowing->update([
            'status' => 'rejected',
        ]);

        return back()->with('success', 'Pengajuan ditolak');
    }

    public function borrow(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'due_date' => 'required|date|after_or_equal:today'
        ]);

        $hasActive = Borrowing::where('user_id', $borrowing->user_id)
            ->where('status', 'borrowed')
            ->exists();

        $borrowing->update([
            'status' => 'borrowed',
            'borrowed_at' => Carbon::now(),
            'due_date' => $request->due_date,
        ]);

        if ($hasActive) {
            return back()->with('error', 'User masih memiliki buku yang belum dikembalikan');
        }

        // kurangi stok
        $borrowing->book->decrement('stock');

        return back()->with('success', 'Buku berhasil dipinjamkan');
    }

    public function return(Borrowing $borrowing)
    {
        $borrowing->update([
            'status' => 'returned',
            'returned_at' => Carbon::now(),
        ]);

        $borrowing->book->increment('stock');

        return back()->with('success', 'Buku dikembalikan');
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return back()->with('success', 'Data peminjaman dihapus');
    }
}
