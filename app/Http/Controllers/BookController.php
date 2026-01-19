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
    
    /**
     * 書籍詳細を表示
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
    * 書籍編集画面を表示
    */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * 書籍を更新
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|max:10000',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.show', $book)
            ->with('success', '書籍を更新しました。');
    }    
    
    public function destroy(Book $book) {}
}