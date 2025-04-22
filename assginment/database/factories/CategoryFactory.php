<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . uniqid(),
            'is_active' => true,
            'tag' => $this->faker->word(),
            'parent_id' => null,  // Hoặc có thể gán giá trị ngẫu nhiên
        ];
    }
}

