<?php

namespace App\Livewire\Client;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class HomePage extends Component
{
    public function index()
    {
        // Đúng cú pháp truy vấn dữ liệu
        $categories = Category::with('images')->orderBy('created_at', 'desc')->get();

        $products = Product::with('variants.images')->get();

        return view('livewire.client.home-page', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}