<?php

namespace App\Livewire\Client;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Models\Blog as ModelsBlog;
class HomePage extends Component
{
    public function index()
{
    // Lấy tất cả các sản phẩm và hình ảnh đầu tiên của chúng
    $products = Product::with('images')->get()->map(function ($product) {
        // Lấy ảnh đầu tiên của sản phẩm
        $product->first_image = $product->images->first();
        return $product;
    });

    $categories = Category::with('images')->orderBy('created_at', 'desc')->get();
    $blog= ModelsBlog::orderBy('created_at', 'desc')->get();

    return view('livewire.client.home-page', [
        'products' => $products,
        'categories' => $categories,
        'blog'=>$blog,
    ]);
}

}