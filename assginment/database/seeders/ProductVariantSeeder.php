<?php
namespace Database\Seeders;
use App\Models\ProductVariants;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    public function run()
    {
        $product = Product::first(); // Lấy sản phẩm đầu tiên

        ProductVariants::create([
            'product_id' => $product->row_id,
            'code' => 'PV-001',
            'name' => 'Product Variant 1',
            'price' => 100,
            'stock' => 50,
            'type' => 'Variant Type 1',
            'pdf' => 'path/to/pdf',
            'image' => 'path/to/image',
            'release_date' => now()
        ]);
    }
}

