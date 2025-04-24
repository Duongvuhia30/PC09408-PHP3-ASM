<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $table = 'cart_items';

    protected $primaryKey = 'row_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'cart_id',
        'product_variant_id',
        'quantity',
        'price',
    ];

    // 🔗 Quan hệ: Item này thuộc về 1 giỏ hàng
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'row_id');
    }

    // 🔗 Quan hệ: Item này là 1 biến thể sản phẩm
    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariants::class, 'product_variant_id', 'row_id');
    }
}
