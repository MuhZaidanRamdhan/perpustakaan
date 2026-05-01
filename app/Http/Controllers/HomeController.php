<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
  public function page()
  {

    $randomBooks = Book::with('category')
      ->inRandomOrder()
      ->take(5)
      ->get();

    return view('pages.homepage', compact('randomBooks'));
  }
}