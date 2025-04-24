<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Chưa phân loại', 'slug' => 'mac-dinh'],
            ['name' => 'Văn học', 'slug' => 'van-hoc'],
            ['name' => 'Tâm lí', 'slug' => 'tam-lí'],
            ['name' => 'Kinh tế', 'slug' => 'kinh-te'],
            ['name' => 'Sách thiếu nhi', 'slug' => 'sach-thieu-nhi'],
            ['name' => 'Tiểu sử - Hồi kí', 'slug' => 'tieu-su-ho-ki'],
        ];

        foreach ($categories as $data) {
            Category::firstOrCreate(
                ['slug' => $data['slug']],
                [
                    'name' => $data['name'],
                    'is_active' => true,
                ]
            );
        }
    }
}
