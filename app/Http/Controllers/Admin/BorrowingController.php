<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Carbon\Carbon;
use Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['user', 'book'])->latest()->get();
        return view('admin.borrowings.index', compact('borrowings'));
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

        $borrowing->update([
            'status' => 'borrowed',
            'borrowed_at' => Carbon::now(),
            'due_date' => $request->due_date,
        ]);

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