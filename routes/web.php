<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index');
});

// 認証が必要なルート
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
});
