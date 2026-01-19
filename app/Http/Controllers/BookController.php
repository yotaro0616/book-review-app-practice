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

    // 他のメソッドは後で実装します
    public function create() {}
    public function store(Request $request) {}
    public function show(Book $book) {}
    public function edit(Book $book) {}
    public function update(Request $request, Book $book) {}
    public function destroy(Book $book) {}
}