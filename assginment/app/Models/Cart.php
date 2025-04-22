<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products;
    public $totalPrice;
    public $totalQuantity;
    public $totalSaved;

    public function __construct($cart = null)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
            $this->totalSaved = $cart->totalSaved ?? 0;
        } else {
            $this->products = [];
            $this->totalPrice = 0;
            $this->totalQuantity = 0;
            $this->totalSaved = 0;
        }
    }

    public function addCart($product, $variant, $variantId)
    {
        $price = $variant->price; // Giá gốc từ variant
        $discountPrice = $variant->discount_price ?? $price; // Giá sau khi giảm giá

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (isset($this->products[$variantId])) {
            // Cập nhật số lượng của sản phẩm
            $this->products[$variantId]['quantity']++;
            // Cập nhật lại giá của sản phẩm
            $this->products[$variantId]['price'] = $this->products[$variantId]['quantity'] * $discountPrice;
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $this->products[$variantId] = [
                'quantity' => 1,
                'price' => $discountPrice,
                'original_price' => $price,
                'productInfo' => $product,
                'variantInfo' => $variant
            ];
        }

        // Cập nhật tổng số lượng và tổng giá trị giỏ hàng
        $this->totalQuantity++;
        $this->totalPrice += $discountPrice;

        // Tính số tiền tiết kiệm nếu có giảm giá
        if ($discountPrice < $price) {
            $this->totalSaved += ($price - $discountPrice);
        }
    }

    public function deleteCart($variantId)
    {
        if (isset($this->products[$variantId])) {
            // Cập nhật lại tổng số lượng và tổng giá trị giỏ hàng
            $this->totalQuantity -= $this->products[$variantId]['quantity'];
            $this->totalPrice -= $this->products[$variantId]['price'];
            unset($this->products[$variantId]);
        }
    }

    public function updateCart($variantId, $quantity)
    {
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        if (isset($this->products[$variantId])) {
            $oldQuantity = $this->products[$variantId]['quantity'];
            $this->products[$variantId]['quantity'] = $quantity;

            // Cập nhật lại tổng số lượng và tổng giá trị
            $this->totalQuantity += ($quantity - $oldQuantity);
            $this->totalPrice += ($quantity - $oldQuantity) * $this->products[$variantId]['variantInfo']->price;
        }
    }
}
