@extends('layouts.app')

@section('title')
Кошик
@endsection

@section('content')
    @include('frontend.includes.breadcrumb', ['crumb' => 'Кошик'])
    <div class="page-cart-ordering">
        <section class="section-cart">
            <div class="container">
                <h2 class="title-section-2 title-section">Кошик</h2>
                <ul class="list-card-product">
                    @if (isset($products_items))
                        @forelse($products_items as $key => $product_item)
                            @include('frontend.includes.product-cart-item')
                        @empty
                            У вашому кошику немає товарів!
                        @endforelse
                    @endif
                </ul>
            </div>
            <div class="total">
                <div class="container block-total">
                    <cart-status></cart-status>
                    <button class="btn-custom-project btn-ordering">Оформити заказ</button>
                    <a href="" class="one-click-buy" data-target="#buyOneClickCartModal" data-toggle="modal" id="btn-one-click-cart">
                        <span>Купити в 1 клік</span>
                        <span class="icon icon-bag-orange"></span>
                    </a>
                    <a href="{{ route('cart-clear') }}" class="btn-custom-project">
                        <span>Очистити кошик</span>
                    </a>
                </div>
            </div>
        </section>

        @include('frontend.includes.cart-order', ['products' => $products_items, 'user' => $user])

        <buy-one-click-cart-modal captcha-src="{{ captcha_src() }}"></buy-one-click-cart-modal>

        @if (!empty($products) && $products->isNotEmpty())
            <section class="section-favorit-product">
                <div class="container">
                    <h3 class="title-section title-section-2 text-md-center">Розпродаж</h3>
                    <ul class="list-product">
                        @foreach ($products as $product)
                            @include('frontend.includes.product-preview-card', ['product' => $product])
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif
    </div>
@endsection
