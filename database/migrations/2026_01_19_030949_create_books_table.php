<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');           // 書籍タイトル
            $table->string('author');          // 著者名
            $table->tinyInteger('rating');     // 評価（1〜5）
            $table->text('review')->nullable(); // レビュー（任意）
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};