@extends('layouts.app')

@section('title')
Оплата і доставка
@endsection

@section('content')
<div class="block-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Головна сторінка</a></li>
                <li class="breadcrumb-item active" aria-current="page">Оплата і доставка </li>
            </ol>
        </nav>
    </div>
</div>
<section class="section-shipping section-info">
    <div class="container">
        <h2 class="title-section-2 title-section">Оплата і доставка</h2>
        <div class="block-top-shipping">
            <div class="img-block">
                <img src="{{ asset('./images/men-info.svg') }}" alt="photo-product" class="img">
            </div>
            <div>
                <p>Умови оплати та доставки обговорюються із нашим менеджером з продажу після того, як клієнт зробив замовлення на сайті та обрав пункт "Доставка транспортною компанією". </p>
                <div class="block-call-manager">
                    <span>Зв'язатися з менеджером</span>
                    <ul>
                        <li>(050) 495-52-30</li>
                        <li class="pb-2">(048) 777-07-00</li>
                        <li> shopdinamoto@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-shipping">
    <div class="container">
        <h3 class="title">Самовивіз зі складу в Одесі</h3>
        <p>Оплата проходить зручним для вас способом : готівкою чи кредитною карткою, у магазині за адресою:</p>
        <ul class="list-location block-contact">
            <li class="ord-1"><span class="icon icon-house"></span><span>Магазин мотоекіпіровки в Одесі</span></li>
            <li class="ord-4"><span class="icon icon-maps"></span>
                <ul>
                    <li>вул. Люстдорфської дороги,</li>
                    <li>96 (р-н "Клюшка")</li>
                </ul>
            </li>
            <li class="ord-2"><span class="icon icon-phone"></span>
                <ul>
                    <li>(050) 495-52-30</li>
                    <li>(048) 777-07-00</li>
                </ul>
            </li>
            <li class="ord-5"><span class="icon icon-mail"></span><span>shopdinamoto@gmail.com</span></li>
            <li class="ord-3">
                <span class="icon icon-clock"></span>
                <ul>
                    <li>Пн.:  10:00-17:00</li>
                    <li>Вт.- Пт. 10:00-18:00</li>
                    <li>Сб.:  11:00-17:00</li>
                    <li>Вс.: Вихідний</li>
                </ul>
            </li>
        </ul>
    </div>
</section>
@endsection
