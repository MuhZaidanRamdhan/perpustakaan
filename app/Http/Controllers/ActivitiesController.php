<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('book')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        // aktif (tidak termasuk rejected)
        $activeBorrowings = $borrowings
            ->whereNull('returned_at')
            ->where('status', '!=', 'rejected');

        // history = returned + rejected
        $historyBorrowings = $borrowings
            ->whereNotNull('returned_at')
            ->merge($borrowings->where('status', 'rejected'));

        return view('pages.activitiespage', compact('activeBorrowings', 'historyBorrowings'));
    }
}