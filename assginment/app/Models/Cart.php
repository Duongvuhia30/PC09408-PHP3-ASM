<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $table = 'carts';

    protected $primaryKey = 'row_id'; 
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'session_id',
    ];

    // 🔗 Quan hệ: Một giỏ hàng có nhiều sản phẩm (cart items)
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class, 'cart_id', 'row_id');
    }

    // 🔗 Quan hệ: Gắn với user (nullable)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'row_id');
    }
}
