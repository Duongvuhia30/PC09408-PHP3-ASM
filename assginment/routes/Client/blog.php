<?php


use App\Livewire\Client\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/blogs', [Blog::class, 'render'])->name('blog');

