<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('category');

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        $userbooks = $query->get();
        $adminbooks = $query->paginate(5);
        $categories = Categories::all();

        if ($request->is('admin/*')) {
            return view('admin.books.index', compact('adminbooks', 'categories'));
        }

        return view('books.index', compact('userbooks', 'categories'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|integer|min:0',
        ]);

        Book::create($request->all());

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Book $book)
    {
        $categories = Categories::all();

        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|integer|min:0',
        ]);

        $book->update($request->all());

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return back()->with('success', 'Buku berhasil dihapus');
    }
}
