<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * 書籍一覧を表示
     */
    public function index()
    {
        $books = Book::latest()->get();
        
        return view('books.index', compact('books'));
    }

    /**
     * 書籍登録画面を表示
     */
    public function create()
    {
        return view('books.create');
    }

    /**
    * 書籍を登録
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|max:10000',
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', '書籍を登録しました。');
    }
    
    public function show(Book $book) {}
    public function edit(Book $book) {}
    public function update(Request $request, Book $book) {}
    public function destroy(Book $book) {}
}