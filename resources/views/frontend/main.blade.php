@extends('layouts.app')

@section('title')
Головна
@endsection

@section('content')
<section class="section-welcome">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item  carousel-inner-1 active">
                <div class="container block-carousel-item">
                    <div class="carousel-caption">
                        <h1 class="text-welcome">Мотоекіпіровка та мотоаксессуари</h1>
                        <p>Безпека та стиль - основні партнери на дорозі. Обирайте серед великого різноманіття товарів свій унікальний захист.</p>
                        <div class="block-btn-to-catalog">
                            <a class="btn-custom-project link-btn" href="{{ route('catalog-product') }}">Вибрати в каталозі</a>
                            <span class="icon-arrow"><i class="icon icon-arrow-btn-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-inner-2">
                <div class="container block-carousel-item">
                    <div class="carousel-caption container">
                        <h1 class="text-welcome">Захисти найголовніше</h1>
                        <p>Якісний шолом - Must Have для будь якого байкера. Найкращі світові бренди забезпечать безпечну подорож.</p>
                        <div class="block-btn-to-catalog">
                            <a class="btn-custom-project link-btn" href="{{ route('catalog-product') }}">Вибрати в каталозі</a>
                            <span class="icon-arrow"><i class="icon icon-arrow-btn-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-inner-3">
                <div class="container block-carousel-item">
                    <div class="carousel-caption container">
                        <h1 class="text-welcome" style="text-shadow: black 0 0 2px;">Починайте сезон із нами!</h1>
                        <p style="text-shadow: black 0 0 2px">Замовляйте із друзями, створюйте свій стиль та насолоджуйтесь свободою. Нові колекції вже чекають на вас.</p>
                        <div class="block-btn-to-catalog">
                            <a class="btn-custom-project link-btn" href="{{ route('catalog-product') }}">Вибрати в каталозі</a>
                            <span class="icon-arrow"><i class="icon icon-arrow-btn-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
@if (!empty($productsSaleCategory1) && $productsSaleCategory1->isNotEmpty() || !empty($productsSaleCategory2) && $productsSaleCategory2->isNotEmpty() || !empty($productsSaleCategory3) && $productsSaleCategory3->isNotEmpty())
    <section class="section-sale-product">
        <div class="container">
            <div class="d-lg-flex">
                <h3 class="title-section text-center">Розпродаж:</h3>
                <ul class="nav nav-tabs" id="myTab-sale" role="tablist">
                    @if (!empty($productsSaleCategory1) && $productsSaleCategory1->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="sale-motojackets-tab" data-toggle="tab" href="#sale-motojackets" role="tab" aria-controls="sale-motojackets" aria-selected="true">мотокуртки</a>
                        </li>
                    @endif
                    @if (!empty($productsSaleCategory2) && $productsSaleCategory2->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="sale-motobots-tab" data-toggle="tab" href="#sale-motobots" role="tab" aria-controls="sale-motobots" aria-selected="false">Мотоботи</a>
                        </li>
                    @endif
                    @if (!empty($productsSaleCategory3) && $productsSaleCategory3->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="sale-motogloves-tab" data-toggle="tab" href="#sale-motogloves" role="tab" aria-controls="sale-motogloves" aria-selected="false">Мотоперчатки</a>
                        </li>
                    @endif
                    @if (!empty($productsSaleCategory4) && $productsSaleCategory4->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="sale-motohelmets-tab" data-toggle="tab" href="#sale-motohelmets" role="tab" aria-controls="sale-motohelmets" aria-selected="false">Мотошоломи</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="tab-content" id="myTabContent-sale">
                @if (!empty($productsSaleCategory1) && $productsSaleCategory1->isNotEmpty())
                    <div class="tab-pane fade show active" id="sale-motojackets" role="tabpanel" aria-labelledby="sale-motojackets-tab">
                        <ul class="slider-sale">
                            @foreach ($productsSaleCategory1 as $product)
                                @include('frontend.includes.item-sale-product-banner')
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (!empty($productsSaleCategory2) && $productsSaleCategory2->isNotEmpty())
                    <div class="tab-pane fade" id="sale-motobots" role="tabpanel" aria-labelledby="sale-motobots-tab">
                        <ul class="slider-sale">
                            @foreach ($productsSaleCategory2 as $product)
                                @include('frontend.includes.item-sale-product-banner')
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (!empty($productsSaleCategory3) && $productsSaleCategory3->isNotEmpty())
                    <div class="tab-pane fade" id="sale-motogloves" role="tabpanel" aria-labelledby="sale-motogloves-tab">
                        <ul class="slider-sale">
                            @foreach ($productsSaleCategory3 as $product)
                                @include('frontend.includes.item-sale-product-banner')
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (!empty($productsSaleCategory4) && $productsSaleCategory4->isNotEmpty())
                    <div class="tab-pane fade" id="sale-motohelmets" role="tabpanel" aria-labelledby="sale-motohelmets-tab">
                        <ul class="slider-sale">
                            @foreach ($productsSaleCategory4 as $product)
                                @include('frontend.includes.item-sale-product-banner')
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
@if (!empty($productsTopCategory1) && $productsTopCategory1->isNotEmpty() || !empty($productsTopCategory2) && $productsTopCategory2->isNotEmpty() || !empty($productsTopCategory3) && $productsTopCategory3->isNotEmpty())
    <section class="section-top-product">
        <div class="container">
            <div class="d-lg-flex">
                <h3 class="title-section text-center">Топ продажів:</h3>
                <ul class="nav nav-tabs" id="myTab-top" role="tablist">
                    @if (!empty($productsTopCategory1) && $productsTopCategory1->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="top-motojackets-tab" data-toggle="tab" href="#top-motojackets" role="tab" aria-controls="top-motojackets" aria-selected="true">мотокуртки</a>
                        </li>
                    @endif
                    @if (!empty($productsTopCategory2) && $productsTopCategory2->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="top-motobots-tab" data-toggle="tab" href="#top-motobots" role="tab" aria-controls="top-motobots" aria-selected="false">Мотоботи</a>
                        </li>
                    @endif
                    @if (!empty($productsTopCategory3) && $productsTopCategory3->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="top-motogloves-tab" data-toggle="tab" href="#top-motogloves" role="tab" aria-controls="top-motogloves" aria-selected="false">Мотоперчатки</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="tab-content" id="myTabContent-top">
                @if (!empty($productsTopCategory1) && $productsTopCategory1->isNotEmpty())
                    <div class="tab-pane fade show active" id="top-motojackets" role="tabpanel" aria-labelledby="top-motojackets-tab">
                        <ul class="list-product">
                            @foreach ($productsTopCategory1 as $product)
                                @include('frontend.includes.product-preview-card', ['product' => $product])
                            @endforeach
                            @include('frontend.includes.product-add-card-as-link', ['path' => route('category', $slug1)])
                        </ul>
                    </div>
                @endif
                @if (!empty($productsTopCategory2) && $productsTopCategory2->isNotEmpty())
                    <div class="tab-pane fade" id="top-motobots" role="tabpanel" aria-labelledby="top-motobots-tab">
                        <ul class="list-product">
                            @foreach ($productsTopCategory2 as $product)
                                @include('frontend.includes.product-preview-card', ['product' => $product])
                            @endforeach
                            @include('frontend.includes.product-add-card-as-link', ['path' => route('category', $slug2)])
                        </ul>
                    </div>
                @endif
                @if (!empty($productsTopCategory3) && $productsTopCategory3->isNotEmpty())
                    <div class="tab-pane fade" id="top-motogloves" role="tabpanel" aria-labelledby="top-motogloves-tab">
                        <ul class="list-product">
                            @foreach ($productsTopCategory3 as $product)
                                @include('frontend.includes.product-preview-card', ['product' => $product])
                            @endforeach
                            @include('frontend.includes.product-add-card-as-link', ['path' => route('category', $slug3)])
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
@if (!empty($productsMaxDiscount) && $productsMaxDiscount->isNotEmpty())
    <section class="section-banner-sale">
        <div class="container">
            <ul class="slider-banner">
                @foreach ($productsMaxDiscount as $product)
                    <li>
                        <div class="item-banner">
                            <div class="block-text">
                                <span class="color-text">{{ $product->name }}</span>
                                <span class="text text-wrap text-break text-truncate text-sale-banner">{{ $product->details ?? '' }}</span>
                                <span class="persent">{{ $product->discount }}%</span>
                                <button onclick="event.preventDefault; window.location.href = '{{ route('card-product', $product->id) }}'"
                                    class="btn-custom-project">Купити</button>
                            </div>
                            <div class="block-img">
                                @if($product->mainImage->isNotEmpty())
                                    <img src="{{ asset('storage/'.$product->mainImage->first()->path) }}" alt="photo-product" class="img img-fluid">
                                @else
                                    <img src="{{ asset('/images/backend/no-image.png') }}" alt="photo-product" class="img img-fluid">
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
@if (!empty($productsNewCategory1) && $productsNewCategory1->isNotEmpty() || !empty($productsNewCategory2) && $productsNewCategory2->isNotEmpty() || !empty($productsNewCategory3) && $productsNewCategory3->isNotEmpty())
    <section class="section-new-product">
        <div class="container">
            <div class="d-lg-flex">
                <h3 class="title-section">Новинки:</h3>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @if (!empty($productsNewCategory1) && $productsNewCategory1->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="motojackets-tab" data-toggle="tab" href="#motojackets" role="tab" aria-controls="motojackets" aria-selected="true">Мотокуртки</a>
                        </li>
                    @endif
                    @if (!empty($productsNewCategory2) && $productsNewCategory2->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="motobots-tab" data-toggle="tab" href="#motobots" role="tab" aria-controls="motobots" aria-selected="false">Мотоботи</a>
                        </li>
                    @endif
                    @if (!empty($productsNewCategory3) && $productsNewCategory3->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="motogloves-tab" data-toggle="tab" href="#motogloves" role="tab" aria-controls="motogloves" aria-selected="false">Мотоперчатки</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                @if (!empty($productsNewCategory1) && $productsNewCategory1->isNotEmpty())
                    <div class="tab-pane fade show active" id="motojackets" role="tabpanel" aria-labelledby="motojackets-tab">
                        <ul class="list-product">
                            @foreach ($productsNewCategory1 as $product)
                                @include('frontend.includes.product-preview-card', ['product' => $product])
                            @endforeach
                            @include('frontend.includes.product-add-card-as-link', ['path' => route('category', $slug1)])
                        </ul>
                    </div>
                @endif
                @if (!empty($productsNewCategory2) && $productsNewCategory2->isNotEmpty())
                    <div class="tab-pane fade" id="motobots" role="tabpanel" aria-labelledby="motobots-tab">
                        <ul class="list-product">
                            @foreach ($productsNewCategory2 as $product)
                                @include('frontend.includes.product-preview-card', ['product' => $product])
                            @endforeach
                            @include('frontend.includes.product-add-card-as-link', ['path' => route('category', $slug2)])
                        </ul>
                    </div>
                @endif
                @if (!empty($productsNewCategory3) && $productsNewCategory3->isNotEmpty())
                    <div class="tab-pane fade" id="motogloves" role="tabpanel" aria-labelledby="motogloves-tab">
                        <ul class="list-product">
                            @foreach ($productsNewCategory3 as $product)
                                @include('frontend.includes.product-preview-card', ['product' => $product])
                            @endforeach
                            @include('frontend.includes.product-add-card-as-link', ['path' => route('category', $slug3)])
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
@endsection
