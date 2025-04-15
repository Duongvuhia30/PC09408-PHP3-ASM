<?php


use App\Livewire\Client\Contacts;
use Illuminate\Support\Facades\Route;

Route::get('/contacts', [Contacts::class, 'index']);
