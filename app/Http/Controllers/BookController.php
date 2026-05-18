<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\Request;
use Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::all();

        // USER PAGE
        if (!$request->is('admin/*')) {
            $query = Book::with('category');

            if ($request->category) {
                $query->where('category_id', $request->category);
            }

            if ($request->search) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            $userbooks = $query->get();

            return view('books.index', compact('userbooks', 'categories'));
        }

        // ADMIN PAGE
        $query = Book::with('category');

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        $adminbooks = $query
            ->orderBy('id', 'asc')
            ->paginate(5)
            ->withQueryString();

        return view('admin.books.index', compact('adminbooks', 'categories'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ebook_file' => 'nullable|mimes:pdf|max:10240',
            'category_id' => 'required|exists:categories,id'

        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        if ($request->hasFile('ebook_file')) {
            $data['ebook_file'] = $request->file('ebook_file')->store('ebooks', 'public');
        }

        Book::create($data);

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
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ebook_file' => 'nullable|mimes:pdf|max:10240',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        if ($request->hasFile('ebook_file')) {
            if ($book->ebook_file) {
                Storage::disk('public')->delete($book->ebook_file);
            }
            $data['ebook_file'] = $request->file('ebook_file')->store('ebooks', 'public');
        }

        $book->update($data);

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Book $book)
    {
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }

        if ($book->ebook_file) {
            Storage::disk('public')->delete($book->ebook_file);
        }

        $book->delete();

        return back()->with('success', 'Buku berhasil dihapus');
    }
}
