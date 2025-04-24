<?php 

use Illuminate\Support\Facades\Route;
use App\Livewire\Client\Cart;
use Illuminate\Support\Facades\Auth;

Route::post('/cart/add', [Cart::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [Cart::class, 'ShowCart'])->name('cart.show');
Route::post('/cart/update', [cart::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [Cart::class, 'deleteFromCart'])->name('cart.remove');
Route::get('/cart/count', function () {
    $count = 0;
    if (Auth::check()) {
        $cart = \App\Models\Cart::where('user_id', Auth::id())->with('items')->first();
        $count = $cart ? $cart->items->sum('quantity') : 0;
    }
    return response()->json(['count' => $count]);
})->name('cart.count');