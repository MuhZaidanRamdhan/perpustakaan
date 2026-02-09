<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;

class AdminDashboardController extends Controller
{
  public function index()
  {
    return view('admin.dashboard', [
      'totalBooks' => Book::count(),
      'activeBorrowings' => Borrowing::where('status', 'pending')->count(),
      'totalUsers' => User::count(),
    ]);
  }
}
