<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'プログラミング',
            'ビジネス',
            '小説',
            '自己啓発',
            'その他',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}