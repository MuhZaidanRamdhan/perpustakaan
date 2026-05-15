<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Categories;
use App\Models\User;

class AdminDashboardController extends Controller
{
  public function index()
  {
    $popularBooks = Book::withCount('borrowings')
      ->orderByDesc('borrowings_count')
      ->take(5)
      ->get();

    return view('admin.dashboard', [
      'totalBooks' => Book::count(),
      'activeBorrowings' => Borrowing::where('status', 'pending')->count(),
      'totalUsers' => User::count(),
      'totalCategories' => Categories::count(),
      'popularBooks' => $popularBooks,
      'outOfStockBooks' => Book::where('stock', 0)->count()
    ]);
  }
}
