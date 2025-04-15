<?php
namespace App\Livewire\Client;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public function showProductsByCategory()
    {
        // Đảm bảo gọi với get() để trả về collection thay vì array
        $products = Product::with('variants.images')->orderBy('created_at', 'desc')->get();
        
        return view('livewire.client.product', [
            'products' => $products,
        ]);
    }
    


    
    public function Detail($id)
    {
        $products = Product::with('variants.images')->findOrFail($id);


        return view('livewire.client.product-detail',[
            'products' => $products,
        ]);
    }
}

