<?php 


use App\Livewire\Client\Cart;
use Illuminate\Support\Facades\Route;

Route::get('/cart', [Cart::class, 'index']);
