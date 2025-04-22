<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Publishers;  // Chú ý sửa lại tên class Publisher từ 'Publishers' thành 'Publisher'
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Seed dữ liệu cho Product với 50 bản
        Product::factory()->count(20)->create();
    }
}
