<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\CartItem;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cart extends Component
{
    public $cart;

    // public function mount()
    // {
    //     $this->cart = Cart::with('items.productVariant.product')
    //         ->where('user_id', Auth::id())
    //         ->first();
    // }
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.'
            ], 401);
        }

        $request->validate([
            'variant_id' => 'required|exists:product_variants,row_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $variant = ProductVariants::findOrFail($request->variant_id);

        $cart = CartModel::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $item = $cart->items()->where('product_variant_id', $variant->row_id)->first();

        if ($item) {
            $item->update([
                'quantity' => $item->quantity + $request->quantity,
                'price' => $variant->price,
            ]);
        } else {
            $cart->items()->create([
                'product_variant_id' => $variant->row_id,
                'quantity' => $request->quantity,
                'price' => $variant->price,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Thêm vào giỏ hàng thành công']);
    }

    public function ShowCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Vui lòng đăng nhập để xem giỏ hàng.');
        }

        $cart = CartModel::with(['items.productVariant'])
            ->where('user_id', Auth::id())
            ->first();

        return view('livewire.client.cart', [
            'cart' => $cart
        ]);
    }
    public function updateCart(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,row_id',
            'action' => 'required|in:increase,decrease',
        ]);

        $variantId = $request->variant_id;
        $action = $request->action;

        $cart = \App\Models\Cart::where('user_id', Auth::id())->first();

        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Giỏ hàng không tồn tại.'], 404);
        }

        $item = $cart->items()->where('product_variant_id', $variantId)->first();

        if ($item) {
            if ($action === 'increase') {
                $item->quantity++;
            } elseif ($action === 'decrease' && $item->quantity > 1) {
                $item->quantity--;
            }

            $item->save();

            // 👇 Tính tổng tiền mới bằng query từ database
            $total = $cart->items()->sum(DB::raw('price * quantity'));

            return response()->json([
                'success' => true,
                'quantity' => $item->quantity,
                'total' => $total
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng.'], 404);
    }


    public function deleteFromCart(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,row_id'
        ]);

        $cart = \App\Models\Cart::where('user_id', Auth::id())->first();

        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy giỏ hàng'], 404);
        }

        $item = $cart->items()->where('product_variant_id', $request->variant_id)->first();

        if ($item) {
            $item->delete();

            // Recalculate total
            $total = $cart->items()->sum(DB::raw('price * quantity'));

            return response()->json([
                'success' => true,
                'message' => 'Đã xoá sản phẩm',
                'total' => $total,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm'], 404);
    }
}
