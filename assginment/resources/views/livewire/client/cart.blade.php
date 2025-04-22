@extends('layout.master')

@section('content')
@section('title', 'Giỏ hàng')

<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Shopping Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted">
                        {{ count($cart->products) }} items
                    </div>
                </div>
            </div>
            
            @if(count($cart->products) > 0)
                @foreach($cart->products as $variantId => $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2">
                                <img class="img-fluid" src="{{ $item['variantInfo']->image ?? 'https://via.placeholder.com/150' }}" alt="{{ $item['productInfo']->title }}">
                            </div>
                            <div class="col">
                                <div class="row text-muted">{{ $item['productInfo']->title }}</div>
                                <div class="row">{{ $item['variantInfo']->name }}</div>
                            </div>
                            <div class="col">
                                <a wire:click="updateCart({{ $variantId }}, {{ $item['quantity'] - 1 }})" href="#">-</a>
                                <a href="#" class="border">{{ $item['quantity'] }}</a>
                                <a wire:click="updateCart({{ $variantId }}, {{ $item['quantity'] + 1 }})" href="#">+</a>
                            </div>
                            <div class="col">
                                € {{ number_format($item['price'], 2) }} 
                                <span wire:click="deleteFromCart({{ $variantId }})" class="close">&#10005;</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <p>Your cart is empty!</p>
                </div>
            @endif

            <div class="back-to-shop">
                <a href="{{ route('shop.index') }}">&leftarrow;</a>
                <span class="text-muted">Back to shop</span>
            </div>
        </div>

        <div class="col-md-4 summary">
            <div><h5><b>Summary</b></h5></div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS {{ count($cart->products) }}</div>
                <div class="col text-right">€ {{ number_format($cart->totalPrice, 2) }}</div>
            </div>
            <form>
                <p>SHIPPING</p>
                <select><option class="text-muted">Standard-Delivery- €5.00</option></select>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">€ {{ number_format($cart->totalPrice + 5.00, 2) }}</div>
            </div>
            <button class="btn">CHECKOUT</button>
        </div>
    </div>
</div>

@endsection
