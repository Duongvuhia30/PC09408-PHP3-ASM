<?php
namespace Database\Seeders;
use App\Models\ImageCategory;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ImageCategorySeeder extends Seeder
{
    public function run()
    {
        $category = Category::first(); // Lấy category đầu tiên

        ImageCategory::create([
            'category_id' => $category->row_id,
            'path' => 'path/to/category-image.jpg'
        ]);
    }
}

