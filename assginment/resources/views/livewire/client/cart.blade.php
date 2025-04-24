@extends('layout.master')
@section('content')
@section('title', 'giỏ hàng')

<style>
    .comic-button {
        display: inline-block;
        margin-top: 10px;
        width: 100%;
        padding: 10px 20px;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #fff;
        background-color: #0D276B;
        border: 2px solid #000;
        box-shadow: 5px 5px 0px #000;
        transition: all 0.3s ease;
    }

    .comic-button:hover {
        background-color: #fff;
        color: #0e2868af;
        border: 2px solid #0e2768a8;
        box-shadow: 5px 5px 0px #0e2768a8;
    }

    .comic-button:active {
        background-color: #335fce;
        box-shadow: none;
        transform: translateY(4px);
    }

    .cart-container {
        margin: 40px auto;
        max-width: 1200px;
        width: 95%;
        border-radius: 1rem;
        background: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .cart-left {
        background-color: #fff;
        padding: 30px;
        border-bottom-left-radius: 1rem;
        border-top-left-radius: 1rem;
    }

    .cart-summary {
        background-color: #f7f7f7;
        border-top-right-radius: 1rem;
        border-bottom-right-radius: 1rem;
        padding: 30px;
    }

    .cart-title {
        display: flex;
        justify-content: space-between;
    }

    .cart-item img {
        width: 3.5rem;
    }

    .cart-remove {
        cursor: pointer;
        font-size: 0.9rem;
        color: red;
    }

    @media (max-width: 767px) {

        .cart-left,
        .cart-summary {
            border-radius: 0 !important;
            padding: 20px;
        }

        .cart-container .row {
            flex-direction: column;
        }

        .cart-summary {
            margin-top: 20px;
        }
    }
</style>

<div class="cart-container card">
    <div class="row">
        <div class="col-md-8 cart-left">
            <div class="cart-title mb-4">
                <h4><b>Giỏ hàng</b></h4>
                <div class="text-muted small">sản phẩm</div>
            </div>

            @forelse($cart->items ?? [] as $item)
                @php
                    $variant = $item->productVariant;
                    $product = $variant->product;
                @endphp
                <div class="cart-item row border-top border-bottom py-3 align-items-center"
                    data-price="{{ $item->price }}">
                    <div class="col-2">
                        <img class="img-fluid"
                            src="{{ asset($variant->image ? 'storage/' . $variant->image : 'images/default.png') }}">
                    </div>
                    <div class="col">
                        <div class="text-muted">{{ $product->title }}</div>
                        <div>{{ $variant->name }}</div>
                    </div>
                    <div class="col">
                        <a href="#" class="update-qty" data-action="decrease"
                            data-id="{{ $variant->row_id }}">-</a>
                        <span class="border px-2 qty">{{ $item->quantity }}</span>
                        <a href="#" class="update-qty" data-action="increase"
                            data-id="{{ $variant->row_id }}">+</a>
                    </div>
                    <div class="col item-total">
                        {{ number_format($item->price, 0, ',', '.') }} đ
                    </div>
                    <div class="col">
                        <span class="cart-remove delete-item" data-id="{{ $variant->row_id }}">&#10005;</span>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <p>Giỏ hàng trống!</p>
                </div>
            @endforelse

            <div class="mt-4">
                <a href="{{ route('client.home') }}" class="text-muted">&leftarrow; Quay lại</a>
            </div>
        </div>

        <div class="col-md-4 cart-summary">
            <h5><b>Tổng hợp</b></h5>
            <hr>
            <div class="d-flex justify-content-between">
                <span>Sản phẩm</span>
                <span>{{ $cart->items->sum('quantity') ?? 0 }}</span>
            </div>

            <form class="my-3">
                <label for="code">Mã giảm giá</label>
                <input id="code" class="form-control" placeholder="Nhập mã">
            </form>

            <div class="d-flex justify-content-between border-top py-2">
                <strong>Tổng giá</strong>
                <strong class="total-price">
                    {{ number_format($cart->items->sum(fn($item) => $item->price * $item->quantity), 0, ',', '.') }} đ
                </strong>
            </div>

            <button class="comic-button">
                <i class="fa fa-credit-card mr-2"></i> Thanh toán
            </button>
        </div>
    </div>
</div>

<script>
    // Hàm cập nhật số lượng hiển thị trên header
    function updateCartCount() {
        fetch("{{ route('client.cart.count') }}")
            .then(res => res.json())
            .then(data => {
                document.getElementById('cart-count').innerText = data.count;
            });
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateCartCount(); // Gọi khi trang tải
    });

    // Cập nhật số lượng
    document.querySelectorAll('.update-qty').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const variantId = this.dataset.id;
            const action = this.dataset.action;
            const row = this.closest('.cart-item');

            fetch("{{ route('client.cart.update') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ variant_id: variantId, action })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    row.querySelector('.qty').innerText = data.quantity;
                    document.querySelector('.total-price').innerText = data.total.toLocaleString('vi-VN') + ' đ';
                    updateCartCount();
                } else {
                    alert(data.message);
                }
            });
        });
    });

    // Xoá sản phẩm
    document.querySelectorAll('.delete-item').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const variantId = this.dataset.id;
            const row = this.closest('.cart-item');

            fetch("{{ route('client.cart.remove') }}", {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ variant_id: variantId })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    row.remove();
                    document.querySelector('.total-price').innerText = data.total.toLocaleString('vi-VN') + ' đ';
                    updateCartCount();
                    if (document.querySelectorAll('.cart-item').length === 0) {
                        window.location.href = "{{ route('client.home') }}";
                    }
                } else {
                    alert(data.message);
                }
            });
        });
    });
</script>
@endsection
