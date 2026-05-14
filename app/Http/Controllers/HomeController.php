<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
  public function page()
  {
    $books = Book::latest()->take(5)->get();

    return view('pages.homepage', compact('books'));
  }
}