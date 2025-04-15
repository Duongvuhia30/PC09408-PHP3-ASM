<?php 

use App\Livewire\Client\About;
use Illuminate\Support\Facades\Route;

Route::get('/about', [About::class, 'index']);
