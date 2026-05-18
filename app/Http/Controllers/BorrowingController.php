<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $query = Borrowing::with(['user', 'book'])
            ->when($search, function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%');
                });
            })
            ->latest();

        $adminBorrowings = $query->orderBy('id', 'asc')->paginate(5)
            ->withQueryString();

        return view('admin.borrowings.index', compact('adminBorrowings'));
    }

    public function store(Book $book)
    {
        // cek stok
        if ($book->stock <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Stok buku habis'
            ], 400);
        }

        $alreadyBorrow = Borrowing::where('user_id', auth()->id())
            ->where('book_id', $book->id)
            ->whereNotIn('status', ['returned', 'rejected'])
            ->exists();

        if ($alreadyBorrow) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah meminjam buku ini'
            ], 400);
        }

        Borrowing::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'status' => 'pending'
        ]);

        // return back()->with('success', 'Permintaan peminjaman dikirim');
        return redirect()
            ->route('Activities')
            ->with('success', 'Permintaan peminjaman dikirim');
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
        try {
            DB::transaction(function () use ($borrowing, $request) {

                $activeCount = Borrowing::where('user_id', $borrowing->user_id)
                    ->where('status', 'borrowed')
                    ->count();

                if ($activeCount >= 5) {
                    throw new \Exception('Maksimal 5 buku yang bisa dipinjam');
                }

                if ($borrowing->book->stock <= 0) {
                    throw new \Exception('Stok buku habis');
                }

                $borrowing->update([
                    'status' => 'borrowed',
                    'borrowed_at' => now(),
                    'due_date' => $request->due_date,
                ]);

                $updated = $borrowing->book()
                    ->where('stock', '>', 0)
                    ->decrement('stock');

                if (!$updated) {
                    throw new \Exception('Stok buku habis');
                }

            });

            return back()->with('success', 'Buku berhasil dipinjamkan');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
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
