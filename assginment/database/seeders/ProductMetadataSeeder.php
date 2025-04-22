<?php
namespace Database\Seeders;
use App\Models\ProductMetadata;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductMetadataSeeder extends Seeder
{
    public function run()
    {
        $product = Product::first(); // Lấy sản phẩm đầu tiên

        ProductMetadata::create([
            'product_id' => $product->row_id,
            'language' => 'English',
            'publish_year' => 2025,
            'author' => 'Author Name'
        ]);
    }
}

