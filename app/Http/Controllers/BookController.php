<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * 書籍一覧を表示
     */
    public function index()
    {
        $categories = Category::all();
        
        // ログインユーザーの書籍のみ取得
        $books = auth()->user()->books()->with('category')->latest()->get();
        
        return view('books.index', compact('books', 'categories'));
    }

    /**
     * 書籍登録画面を表示
     */
    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    /**
    * 書籍を登録
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|max:10000',
        ]);

        // ログインユーザーの書籍として作成
        auth()->user()->books()->create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', '書籍を登録しました。');
    }
    
    /**
     * 書籍詳細を表示
     */
    public function show(Book $book)
    {
        $this->authorize('view', $book);

        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        
        $categories = Category::all();
        
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * 書籍を更新
     */
    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|max:10000',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.show', $book)
            ->with('success', '書籍を更新しました。');
    }    
    
    /**
     * 書籍を削除
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', '書籍を削除しました。');
    }
}