@extends('layouts.app')

@section('title')
Головна
@endsection

@section('content')
<div class="block-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Головна сторінка</a></li>
                <li class="breadcrumb-item active" aria-current="page">Кошик</li>
            </ol>
        </nav>
    </div>
</div>
<div class="page-cart-ordering">
    <section class="section-cart">
        <div class="container">
         <div id="Modal-thank">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-top">
                    <h5 class="title" >Дякуємо!</h5>
                </div>
                <div class="modal-body">
                    <span class="text-thank">Ваше замовлення успішно оформлено.</span>
                    <span class="text-thank">Ми зв'яжемося з Вами найближчим часом!</span>
                    <span class="text-thank"> Номер замовлення <span class="number-order">№ {{$order_id}}</span></span>
                </div>
                <div class="modal-bottom">
                    <a class="btn" href="{{route('main')}}">Повернутися на головну</a>
                </div>
            </div>
        </div>
    </div>
        </div>
    </section>

    <section class="section-favorit-product">
        <div class="container">
            <h3 class="title-section title-section-2 text-md-center">РОзпродаж</h3>
            <ul class="list-product">
                <li class="item-product">
                    <div class="block">
                        <span class="icon icon-like"></span>
                        <a href="#" class="link-product">
                            <img src="{{ asset('/images/product-1.png') }}" alt="photo-product" class="img">
                            <span class="name-product">Мотокуртка IXS </span>
                            <span class="name-product">Sondrio 2.0</span>
                            <span class="price"><span class="sum">8555.00</span><span>грн.</span></span>
                            <span class="block-icon-eye"><span class="icon icon-eye"></span></span>
                        </a>
                    </div>
                    <div class="bottom-block-product">
                        <a href="#" class="btn-buy">
                            <span class="btn-custom-project"><span class="pb-1">В кошик</span></span>
                            <span class="icon icon-basket"></span>
                        </a>
                        <a href="#" class="one-click-buy"><span class="icon icon-bag"></span><span>Купити в 1 клік</span></a>
                    </div>
                </li>
                <li class="item-product">
                    <div class="block">
                        <span class="icon icon-like-active"></span>
                        <a href="#" class="link-product">
                            <img src="{{ asset('/images/product-1.png') }}" alt="photo-product" class="img">
                            <span class="name-product">Мотокуртка IXS </span>
                            <span class="name-product">Sondrio 2.0</span>
                            <span class="price"><span class="sum">8555.00</span><span>грн.</span></span>
                            <span class="block-icon-eye"><span class="icon icon-eye"></span></span>
                        </a>
                    </div>
                    <div class="bottom-block-product">
                        <a href="#" class="btn-buy">
                            <span class="btn-custom-project"><span class="pb-1">В кошик</span></span>
                            <span class="icon icon-basket"></span>
                        </a>
                        <a href="#" class="one-click-buy"><span class="icon icon-bag"></span><span>Купити в 1 клік</span></a>
                    </div>
                </li>
                <li class="item-product">
                    <div class="block">
                        <span class="icon icon-like"></span>
                        <a href="#" class="link-product">
                            <img src="{{ asset('/images/product-1.png') }}" alt="photo-product" class="img">
                            <span class="name-product">Мотокуртка IXS </span>
                            <span class="name-product">Sondrio 2.0</span>
                            <span class="price"><span class="sum">8555.00</span><span>грн.</span></span>
                            <span class="block-icon-eye"><span class="icon icon-eye"></span></span>
                        </a>
                    </div>
                    <div class="bottom-block-product">
                        <a href="#" class="btn-buy">
                            <span class="btn-custom-project"><span class="pb-1">В кошик</span></span>
                            <span class="icon icon-basket"></span>
                        </a>
                        <a href="#" class="one-click-buy"><span class="icon icon-bag"></span><span>Купити в 1 клік</span></a>
                    </div>
                </li>
                <li class="item-product">
                    <div class="block">
                        <span class="icon icon-like"></span>
                        <a href="#" class="link-product">
                            <img src="{{ asset('/images/product-1.png') }}" alt="photo-product" class="img">
                            <span class="name-product">Мотокуртка IXS </span>
                            <span class="name-product">Sondrio 2.0</span>
                            <span class="price"><span class="sum">8555.00</span><span>грн.</span></span>
                            <span class="block-icon-eye"><span class="icon icon-eye"></span></span>
                        </a>
                    </div>
                    <div class="bottom-block-product">
                        <a href="#" class="btn-buy">
                            <span class="btn-custom-project"><span class="pb-1">В кошик</span></span>
                            <span class="icon icon-basket"></span>
                        </a>
                        <a href="#" class="one-click-buy"><span class="icon icon-bag"></span><span>Купити в 1 клік</span></a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</div>
@endsection
