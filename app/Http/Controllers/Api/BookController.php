<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * 書籍一覧を取得
     */
    public function index()
    {
        $books = Book::latest()->get();
        
        return BookResource::collection($books);
    }

    /**
     * 書籍詳細を取得
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }
}