<?php

use App\Livewire\Client\About;
use App\Livewire\Client\Blog;
use App\Livewire\Client\Cart;
use App\Livewire\Client\Contacts;
use App\Livewire\Client\HomePage;
use App\Livewire\Client\ProductDetail;
use App\Livewire\Client\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('client.home');
});
Route::get('/',[HomePage::class,"index"]);
Route::get('/products',[Products::class,"products"]);
Route::get('/productdetail',[Products::class,"Detail"]);
Route::get('/contacts',[Contacts::class,"index"]);
Route::get('/about',[About::class,"index"]);
Route::get('/blogs',[Blog::class,"index"]);
Route::get('/cart',[Cart::class,"index"]);



