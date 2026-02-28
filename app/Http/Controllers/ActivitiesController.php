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

        $activeBorrowings = $borrowings->where('returned_at', null);
        $historyBorrowings = $borrowings->where('returned_at', '!=', null);

        return view('pages.activitiespage', compact('activeBorrowings', 'historyBorrowings'));
    }
}