<?php
namespace Database\Seeders;
use App\Models\ImageProductVariants;
use App\Models\ProductVariants;
use Illuminate\Database\Seeder;

class ImageProductVariantSeeder extends Seeder
{
    public function run()
    {
        $productVariant = ProductVariants::first(); // Lấy variant đầu tiên

        ImageProductVariants::create([
            'product_id' => $productVariant->product_id,
            'path' => 'path/to/image.jpg'
        ]);
    }
}

