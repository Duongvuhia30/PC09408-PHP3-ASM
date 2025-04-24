<?php

namespace App\Livewire\Client;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart as CartModel;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\Auth;

class Products extends Component
{
    public function showProductsByCategory()
    {
        // Đảm bảo gọi với get() để trả về collection thay vì array
        $products = Product::with('images')->orderBy('created_at', 'desc')->get();

        return view('livewire.client.product', [
            'products' => $products,
        ]);
    }

    public function Detail($id)
    {
        $products = Product::with(['images', 'variants'])->findOrFail($id);

        return view('livewire.client.product-detail', [
            'products' => $products,
        ]);
    }

   
}
