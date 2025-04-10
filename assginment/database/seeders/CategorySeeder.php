<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // database/seeders/CategorySeeder.php
        Category::firstOrCreate([
            'slug' => 'mac-dinh',
        ], [
            'name' => 'Chưa phân loại',
            'is_active' => true,
        ]);
    }
}
