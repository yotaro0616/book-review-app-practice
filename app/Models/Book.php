<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    /**
     * 一括代入可能な属性
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'author',
        'rating',
        'review',
    ];

    /**
     * 書籍を所有するユーザー
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 書籍が属するカテゴリ
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}