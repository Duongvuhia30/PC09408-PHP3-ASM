<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Publishers;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),  // Tạo giá trị ngẫu nhiên cho title
            'description' => $this->faker->paragraph(),
            'slug' => $this->faker->slug(),
            'tag' => $this->faker->words(3, true),
            'type' => $this->faker->word(),
            'release_date' => $this->faker->dateTime(),
            'is_active' => true,
            'publisher_id' => Publishers::inRandomOrder()->first()?->row_id,  // Thêm publisher_id
        ];
    }
}
