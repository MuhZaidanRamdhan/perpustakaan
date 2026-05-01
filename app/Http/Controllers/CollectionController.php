<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function page()
    {
        return view('pages.collectionpage');
    }

    public function index(Request $request)
    {
        $query = Book::with('category');

        $userBorrowings = Borrowing::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'approved', 'borrowed'])
            ->get()
            ->keyBy('book_id');

        // 🔍 SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('author', 'like', '%' . $request->search . '%');
            });
        }

        // 📚 FILTER CATEGORY
        if ($request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $books = $query->latest()->paginate(10)->withQueryString();

        return view('pages.collectionpage', compact('books', 'userBorrowings'));
    }
}
