<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run()
    {
        $product = Product::first(); // Lấy sản phẩm đầu tiên
        $category = Category::first(); // Lấy category đầu tiên

        $product->categories()->attach($category->row_id);
    }
}

