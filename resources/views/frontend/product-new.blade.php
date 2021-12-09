@extends('layouts.app')

@section('title', 'Новинки')

@section('content')
@include('frontend.includes.breadcrumb', ['crumb' => 'Новинки'])
<section class="bg-catalog">
    <div class="container">
        <div class="main page-catalog">
            <h3 class="title-section title-section-2 pb-md-0">Новинки</h3>
            <div class="block-filter-product">
                <div class="left">
                    @include('frontend.includes.select.sort')
                </div>
                <div class="right d-none d-lg-flex">
                    @include('frontend.includes.select.count')
                </div>
                <div class="right d-md-none">
                    <button class="btn-mob-filter btn btn-custom-project rounded-0 align-items-center" type="button" data-toggle="collapse" data-target="#filter-collapse" aria-expanded="false" aria-controls="filter-collapse">
                        <span>Фільтр</span>
                        <i class="icon icon-next-white"></i>
                    </button>
                </div>
            </div>
            @include('frontend.includes.filter.static-filter')
            @if (!empty($products) && $products->isNotEmpty())
                <div>
                    <div class="block-pagination d-none d-lg-block">
                        {{ $products->onEachSide(2)->links('vendor.pagination.motoshop-pagination') }}
                    </div>
                    <div class="block-pagination d-block d-lg-none custom-pag">
                        {{ $products->onEachSide(0)->links('vendor.pagination.motoshop-pagination') }}
                    </div>
                    <ul class="list-product">
                        @foreach ($products as $product)
                            @include('frontend.includes.product-preview-card', ['product' => $product])
                        @endforeach
                        @if ($products->hasPages() && $products->currentPage() != $products->lastPage())
                            @include('frontend.includes.product-add-card', ['hashFragment' => '#card-product'])
                        @endif
                    </ul>
                    <div class="block-pagination d-none d-lg-block">
                        {{ $products->onEachSide(2)->links('vendor.pagination.motoshop-pagination') }}
                    </div>
                    <div class="block-pagination d-block d-lg-none custom-pag">
                        {{ $products->onEachSide(0)->links('vendor.pagination.motoshop-pagination') }}
                    </div>
                </div>
            @else
                <p class="text-center" style="height: 296px">Нажаль зараз немає жодного товару у новинках</p>
            @endif
        </div>
    </div>
</section>

@endsection
