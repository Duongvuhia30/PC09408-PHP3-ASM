<?php 


use App\Livewire\Client\Products;
use App\Livewire\Client\ProductDetail;

use Illuminate\Support\Facades\Route;

Route::get('/productdetail/{id}',[Products::class,"Detail"]);
