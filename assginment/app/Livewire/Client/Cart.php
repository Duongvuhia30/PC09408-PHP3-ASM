<?php

namespace App\Livewire\Client;

use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\Cart as ShoppingCart;
use Illuminate\Http\Client\Request;
use Livewire\Component;

class Cart extends Component
{
    public function index(Request $request)
    {
        $cart = session()->get('cart', new \App\Models\Cart());
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $variant = ProductVariants::findOrFail($request->variant_id);

        $cart = session()->get('cart', new \App\Models\Cart());
        $cart->addCart($product, $variant, $request->variant_id, $request->quantity);
        
        session()->put('cart', $cart);
        
        return response()->json([
            'success' => true,
            'cart' => $cart,
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng'
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', new \App\Models\Cart());
        $cart->updateCart($request->variant_id, $request->quantity);
        
        session()->put('cart', $cart);
        
        return response()->json([
            'success' => true,
            'cart' => $cart
        ]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,id'
        ]);

        $cart = session()->get('cart', new \App\Models\Cart());
        $cart->deleteCart($request->variant_id);
        
        session()->put('cart', $cart);
        
        return response()->json([
            'success' => true,
            'cart' => $cart
        ]);
    }
}

