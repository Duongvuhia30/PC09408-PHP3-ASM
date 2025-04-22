<?php 

use Illuminate\Support\Facades\Route;
use App\Livewire\Client\Cart as CartController;

// Đảm bảo truyền variantId (chứ không phải product) vào khi thêm vào giỏ hàng.
Route::post('/cart/add/{variantId}', [CartController::class, 'addToCart'])->name('cart.add');

// Định tuyến cho trang giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
