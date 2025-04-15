<?php


use App\Livewire\Client\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePage::class, 'index']);
