<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Carbon\Carbon;

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

        return back()->with('success', 'Peminjaman disetujui');
    }

    public function return(Borrowing $borrowing)
    {
        $borrowing->update([
            'status' => 'returned',
            'returned_at' => Carbon::now(),
        ]);

        // stok buku balik
        $borrowing->book->increment('stock');

        return back()->with('success', 'Buku berhasil dikembalikan');
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return back()->with('success', 'Data peminjaman dihapus');
    }
}