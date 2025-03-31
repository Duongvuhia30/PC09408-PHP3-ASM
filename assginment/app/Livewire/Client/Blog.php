<?php

namespace App\Livewire\Client;


use Livewire\Component;

class Blog extends Component
{

    public function index()
    {
        return view('livewire.client.blogs');
    }

}
