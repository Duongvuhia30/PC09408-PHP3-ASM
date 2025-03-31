<?php

namespace App\Livewire\Client;


use Livewire\Component;

class Products extends Component
{

    public function products()
    {
        return view('livewire.client.product');
    }
    public function Detail()
    {
        return view('livewire.client.product-detail');
    }
}

