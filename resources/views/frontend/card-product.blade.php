@extends('layouts.app')

@section('title', $product->name)

@section('description', $product->description)
@section('keywords', $product->keywords)

@section('content')
@if ($product->categories->first() !== null)
    @include('frontend.includes.breadcrumb-product', ['routeName' => 'category', 'crumbSub' => $product->categories->firstWhere('category_id', '!=', null), 'crumbPar' => $product->categories->firstWhere('category_id', null), 'crumbProd' => $product])
@else
    @include('frontend.includes.breadcrumb-catalog', ['crumb' => $product->name])
@endif

<div class="page-item-product">
    <section class="section-item-product item-product">
        <div class="container">
            <div class="top-block-item-product">
                {{-- Слайдер картинок от MD ширины экрана --}}
                <section class="banner-section align-self-start d-none d-md-block" style="z-index: 0; position: sticky; top: 0;">
                    <div class="block-slider">
                        <div class="vehicle-detail-banner banner-content clearfix">
                            <div class="banner-slider">
                                @if($product->images()->exists())
                                    <div class="slider slider-nav thumb-image">
                                        @foreach($product->images as $image)
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="{{ asset('storage/'.$image->path) }}" alt="photo-product" class="img img-fluid">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="slider slider-for no-mobile">
                                        @foreach($product->images as $image)
                                            <div class="slider-banner-image">
                                                <div class="img-block">
                                                    <span class="label-product-new">
                                                        @if ($product->is_new)
                                                            <div class="new">Новинка</div>
                                                        @endif
                                                        @if ($product->views > $avg_product)
                                                            <div class="top">Топ продажу</div>
                                                        @endif
                                                        @if ($product->on_sale)
                                                            <div class="on-sale">Розпродаж</div>
                                                        @endif
                                                        @if ($product->actual_promotion && $product->getActualPriceByRole() != $product->price)
                                                            <div class="sale">Акція</div>
                                                        @elseif ($product->actual_discount && $product->getActualPriceByRole() != $product->price)
                                                            <div class="sale">{{$product->discount ?? ''}}% Скидка</div>
                                                            {{-- <countdown-timer duration="{{ \Carbon\Carbon::createFromTimestamp(strtotime($product->discount_until)) }}"></countdown-timer> --}}
                                                        @endif
                                                    </span>
                                                    <img src="{{ asset('storage/'.$image->path) }}" alt="photo-product" class="img img-fluid show-img">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="slider slider-nav thumb-image">
                                        <div class="thumbnail-image">
                                            <div class="thumbImg">
                                                <img src="{{ asset('/images/backend/no-image.png') }}" alt="photo-product" class="img img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider slider-for">
                                        <div class="slider-banner-image">
                                            <div class="img-block">
                                                <span class="label-product-new">
                                                    @if ($product->is_new)
                                                        <div class="new">Новинка</div>
                                                    @endif
                                                    @if ($product->views > $avg_product)
                                                        <div class="top">Топ продажу</div>
                                                    @endif
                                                    @if ($product->on_sale)
                                                        <div class="on-sale">Розпродаж</div>
                                                    @endif
                                                    @if ($product->actual_promotion && $product->getActualPriceByRole() != $product->price)
                                                        <div class="sale">Акція</div>
                                                    @elseif ($product->actual_discount && $product->getActualPriceByRole() != $product->price)
                                                        <div class="sale">{{$product->discount ?? ''}}% Скидка</div>
                                                        {{-- <countdown-timer duration="{{ \Carbon\Carbon::createFromTimestamp(strtotime($product->discount_until)) }}"></countdown-timer> --}}
                                                    @endif
                                                </span>
                                                <img src="{{ asset('/images/backend/no-image.png') }}" alt="photo-product" class="img img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Слайдер картинок до MD ширины экрана --}}
                <section class="banner-section d-md-none" style="z-index: 0">
                    <div class="block-slider">
                        <div class="d-md-none">
                            <h2 class="title-product">{{ $product->name ?? 'Назва товару' }}</h2>
                            <span class="article">Артікул: {{ $product->article ?? 'Артікул товару' }}</span>
                        </div>
                        <div class="vehicle-detail-banner banner-content clearfix">
                            <div class="banner-slider">
                                @if($product->images()->exists())
                                    <div class="slider slider-nav thumb-image">
                                        @foreach($product->images as $image)
                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <img src="{{ asset('storage/'.$image->path) }}" alt="photo-product" class="img img-fluid">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="slider slider-for mobile">
                                        @foreach($product->images as $image)
                                            <div class="slider-banner-image">
                                                <div class="img-block">
                                                    <span class="label-product-new">
                                                        @if ($product->is_new)
                                                            <div class="new">Новинка</div>
                                                        @endif
                                                        @if ($product->views > $product->avg('views'))
                                                            <div class="top">Топ продажу</div>
                                                        @endif
                                                        @if ($product->on_sale)
                                                            <div class="on-sale">Розпродаж</div>
                                                        @endif
                                                        @if ($product->actual_promotion && $product->getActualPriceByRole() != $product->price)
                                                            <div class="sale">Акція</div>
                                                        @endif
                                                        @if ($product->actual_discount && $product->getActualPriceByRole() != $product->price)
                                                            <div class="sale">{{$product->discount ?? ''}}% Скидка</div>
                                                            {{-- <countdown-timer duration="{{ \Carbon\Carbon::createFromTimestamp(strtotime($product->discount_until)) }}"></countdown-timer> --}}
                                                        @endif
                                                    </span>
                                                    <img src="{{ asset('storage/'.$image->path) }}" alt="photo-product" class="img img-fluid show-img">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="slider slider-nav thumb-image">
                                        <div class="thumbnail-image">
                                            <div class="thumbImg">
                                                <img src="{{ asset('/images/backend/no-image.png') }}" alt="photo-product" class="img img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider slider-for">
                                        <div class="slider-banner-image">
                                            <div class="img-block">
                                                <span class="label-product-new">
                                                    @if ($product->is_new)
                                                        <div class="new">Новинка</div>
                                                    @endif
                                                    @if ($product->views > $avg_product)
                                                        <div class="top">Топ продажу</div>
                                                    @endif
                                                    @if ($product->on_sale)
                                                        <div class="on-sale">Розпродаж</div>
                                                    @endif
                                                    @if ($product->actual_promotion && $product->getActualPriceByRole() != $product->price)
                                                        <div class="sale">Акція</div>
                                                    @elseif ($product->actual_discount && $product->getActualPriceByRole() != $product->price)
                                                        <div class="sale">{{$product->discount ?? ''}}% Скидка</div>
                                                        {{-- <countdown-timer duration="{{ \Carbon\Carbon::createFromTimestamp(strtotime($product->discount_until)) }}"></countdown-timer> --}}
                                                    @endif
                                                </span>
                                                <img src="{{ asset('/images/backend/no-image.png') }}" alt="photo-product" class="img img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
                <form id="CardProductAttr" class="info-product">
                    <input name="product_id" type="hidden" value="{{ $product->id }}">
                    <div class="d-none d-md-block">
                        <h2 class="title-product">{{ $product->name ?? 'Назва товару' }}</h2>
                        <span class="article">Артікул: {{ $product->article ?? 'Артікул товару' }}</span>
                    </div>
                        <div class="price">
                            @guest
                                @if ($product->getActualPriceByRole() != $product->price)
                                    <span class="text-secondary text-line-through"><span>{{ $product->price }}</span> грн.</span>
                                @endif
                                <span>{{ $product->getActualPriceByRole() }}<span> грн.</span></span>
                            @endguest
                            @auth
                                @if ($product->getActualPriceByRole() != $product->price && !auth()->user()->hasRole('dealer'))
                                    <span class="text-secondary text-line-through"><span>{{ $product->price }}</span> грн.</span>
                                @endif
                                <span>{{ $product->getActualPriceByRole() }}<span> грн.</span></span>
                            @endauth
                        </div>
                    {{-- Выбор размера товара --}}
                    <block-size :sizes="{{ json_encode($product->size) ?? [] }}"></block-size>
                    {{-- Выбор цвета товара --}}
                    <block-color :colors="{{ json_encode($product->color) ?? [] }}"></block-color>
                    {{-- Выбор материала товара --}}
                    <block-material :materials="{{ json_encode($product->material) ?? [] }}"></block-material>
                    {{-- Выбор направления товара --}}
                    <block-direction :directions="{{ json_encode($product->direction) ?? [] }}"></block-direction>
                    {{-- Выбор гендорного признака товара --}}
                    <block-sex :sexs="{{ json_encode($product->sex) ?? [] }}"></block-sex>
                    {{-- Выбор сезона товара --}}
                    <block-season :seasons="{{ json_encode($product->season) ?? [] }}"></block-season>
                    @if ($product->quantity != 0)
                        <div class="block-button-item-product">
                            <div>
                                <div class="block-btn-item-buy">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <block-count></block-count>
                                        <button-add-cart :product="{{ $product }}" :form-check="true" :price="{{ $product->price }}"
                                            :actual-price="{{ $product->getActualPriceByRole() }}"
                                            :actual-discount="{{ $product->actual_discount ? 'true' : 'false' }}"></button-add-cart>
                                    </div>
                                    <div class="block-like-add-product">
                                        <activate-buy-one-click-modal></activate-buy-one-click-modal>
                                        <span class="block-like-product">
                                            <like-non-click :switch-disable="switchDisable"></like-non-click>
                                            <button-favorite :status="{{ $product->checkFavoritProduct() ? 'true' : 'false' }}"
                                                :product-id="{{ $product->id }}" :switch-disable="switchDisable"></button-favorite>
                                        </span>
                                    </div>
                                </div>
                                <div class="block-info-shiping">
                                    {{-- <span><span class="icon icon-shipping"></span>Доставка по Україні безкоштовна</span> --}}
                                    <span class="ml-lg-4"><span class="icon-shield"></span>Гарантія 12 місяців</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">
                        Опис
                    </a>
                </li>
                @if ($product->videos->isNotEmpty())
                    <li class="nav-item">
                        <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">
                            Відео
                        </a>
                    </li>
                @endif
            </ul>
            <div class="tab-content tab-content-text-product" id="myTabContent">
                <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <table class="table-item-product">
                        <tr><td>Бренд</td><td>{{ $product->brand->name ?? 'Немає бренду' }}</td></tr>
                        @if ($product->categories->has('category'))
                            <tr><td>Вид товару</td><td>{{ $product->categories->first()->category->name ?? 'Немає категорії'}}</td></tr>
                        @else
                            <tr><td>Вид товару</td><td>{{ $product->categories->first()->name ?? 'Немає категорії'}}</td></tr>
                        @endif
                        @if ($product->length && $product->width && $product->height && $product->dim_unit)
                            <tr><td>Розміри</td><td>{{ $product->length ?? '-' }}x{{ $product->width ?? '-' }}x{{ $product->height ?? '-' }} {{ $product->dim_unit ?? '-' }}.</td></tr>
                        @endif
                        @if ($product->weight && $product->weight_unit)
                            <tr><td>Маса товару</td><td>{{ $product->weight ?? '-' }} {{ $product->weight_unit ?? '-' }}.</td></tr>
                        @endif
                    </table>
                    <p>{{ $product->details ?? 'Опис товару' }}</p>
                </div>
                <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                    <video-player :videos="{{ $product->videos }}" view-width="100%"></video-player>
                </div>
            </div>
        </div>
    </section>
    <buy-one-click-modal captcha-src="{{ captcha_src() }}"></buy-one-click-modal>
    <div class="modal fade modal-info-client" id="Modal-warning" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-top">
                    <h5 class="title">Увага!</h5>
                </div>
                <div class="modal-body">
                    <span class="text-thank">Будь ласка оберіть розмір товару</span>
                    {{-- <span class="text-thank">Оберіть будь ласка всі характеристики товару </span>
                    <span class="text-small">(розмір, колір, матеріал тощо)</span> --}}
                </div>
                <div class="modal-bottom">
                    <button class="btn"  aria-label="Close" data-dismiss="modal" data-target="#Modal-warning">Закрити</button>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($products))
        <section class="section-favorit-product">
            <div class="container">
                <h3 class="title-section title-section-2">Рекомендації</h3>
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
@section('script')
    <script>
        $(document).ready(function() {
            var selector1 = '.no-mobile .slick-slide:not(.slick-cloned) img';
            // var selector2 = '.mobile .slick-slide:not(.slick-cloned) img';
            var elem1 = $(selector1);
            console.log(elem1);
            var gallery = [];
            elem1.each(function(index, element) {
                gallery.push({
                    src: element.attributes.src.value
                });
            });
            console.log(gallery);
            $('.show-img').on('click', function(e) {
                Fancybox.Fancybox.show(gallery, {
                    //
                });
            });
        });
    </script>
@endsection
