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
//         // Ví dụ nếu bạn không có biến sản phẩm từ DB
// $price = 10000; // Giá cố định hoặc lấy từ bất kỳ nguồn nào


        return view('livewire.client.product-detail');
    }
}
// , compact('price')
