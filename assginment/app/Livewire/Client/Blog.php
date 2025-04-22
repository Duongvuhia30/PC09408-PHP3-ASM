<?php

namespace App\Livewire\Client;

use App\Models\Blog as ModelsBlog;
use App\Models\CategoryBlog;
use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        $blog = ModelsBlog::orderBy('created_at', 'desc')->get();
        $category = CategoryBlog::orderBy('created_at', 'desc')->get();
        return view('livewire.client.blogs', [
            'blog' => $blog,
            'category' => $category,
        ]);
    }
    

}
