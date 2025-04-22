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
  
    $products = Product::with('images')->get()->map(function ($product) {
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