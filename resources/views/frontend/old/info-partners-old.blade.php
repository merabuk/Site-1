@extends('layouts.app')

@section('title')
Партнерам
@endsection

@section('content')
<div class="block-info">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Головна сторінка</a></li>
                <li class="breadcrumb-item active" aria-current="page">Партнерам</li>
            </ol>
        </nav>
    </div>
</div>
<section class="section-info">
    <div class="container">
        <h2 class="title-section-2 title-section">Партнерам</h2>
        <div class="block-top-info">
            <div class="img-block">
                <img src="{{ asset('./images/img-info-partners.svg') }}" alt="photo-product" class="img">
            </div>
            <div>
                <span class="text-strong">Шановні панове!</span>
                <p class="pt-lg-4"> В даний час наша компанія «Дінамото» проводить роботу по розширенню дилерської мережі і пропонує Вам розглянути питання можливої співпраці.</p>
                <p class="pt-lg-4">Компанія «Дінамото» ОФІЦІЙНО представляє в Україні такі бренди:</p>
            </div>
        </div>
        <ul class="list-site">
            <li>
                <div>
                    <span class="title">ALPINESTARS (Італія)</span>
                    <span class="icon-site">Сайт: www.alpinestars.com</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Ozone (Польща)</span>
                    <span class="icon-site">Сайт: https://ozone-moto.com</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Airoh  (Італія)</span>
                    <span class="icon-site">Сайт: https://www.airoh.com/ </span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Rev’it (Голландія)</span>
                    <span class="icon-site">Сайт: https://www.revitsport.com/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Acerbis (Італія)</span>
                    <span class="icon-site">Сайт: https://www.acerbis.com/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Rebelhorn (Польща)</span>
                    <span class="icon-site">Сайт: https://rebelhorn.com/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">AGV (Італія)</span>
                    <span class="icon-site">Cайт: https://www.agv.com/us/en/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Scorpion (Франція- США)</span>
                    <span class="icon-site">Cайт: https://www.scorpionusa.com/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Bering (Франція)</span>
                    <span class="icon-site">Сайт: www.bering.fr</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Segura (Франція)</span>
                    <span class="icon-site">Cайт: https://segura-moto.fr/index-fr.php</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Bagster (Франція)</span>
                    <span class="icon-site">Сайт: https://bagster.com</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Shark (Франція)</span>
                    <span class="icon-site">Cайт: https://shark-helmets.com/index-fr.php</span>
                </div>

            </li>
            <li class="not-icon">
                <div>
                    <span class="title">BLH Бюджетна лінійка бренду .</span>
                    <span>BERING</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Shoei (Японія)</span>
                    <span class="icon-site">Сайт: https://www.shoei.com/worldwide/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Caberg (Італія)</span>
                    <span class="icon-site">https://www.caberg.it/en/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Schuberth (Німеччина)</span>
                    <span class="icon-site">Сайт: https://www.schuberth.com/en.html</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">HJC (Корея)</span>
                    <span class="icon-site">Сайт: https://www.hjchelmets.com/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">TCX (Італія)</span>
                    <span class="icon-site">Сайт: https://www.tcxboots.com/eu_en/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">KAPPA (Італія)</span>
                    <span class="icon-site">Сайт: https://www.kappamoto.com/My-motorcycle/</span>
                </div>

            </li>
            <li class="not-icon">
                <div>
                    <span class="title">4city "Міська" лінійка бренду BERING</span>
                    <span>BERING</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">MT Helmets (Іспанія)</span>
                    <span class="icon-site">Cайт: https://mthelmets.com/en/home/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Zandona (Італія)</span>
                    <span class="icon-site">Cайт: https://moto.zandona.net/</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">Nexx (Португалія)</span>
                    <span class="icon-site">Сайт: https://www.nexx-helmets.com/en/</span>
                </div>
            </li>
        </ul>
    </div>
</section>
@endsection
