@extends('layouts.app')

@section('title', 'Обране')

@section('content')
@include('frontend.includes.breadcrumb-favorite', ['crumb' => 'Обране'])
<section class="section-favorit-product">
    <div class="container">
        <h3 class="title-section title-section-2">Обране</h3>
        @if (!empty($favorites) && $favorites->isNotEmpty())
            <div class="block-filter-product">
                <div class="left">
                    @include('frontend.includes.select.sort')
                </div>
                <div class="right d-none d-lg-flex">
                    @include('frontend.includes.select.count')
                </div>
            </div>
            <div class="block-pagination d-none d-lg-block">
                {{ $favorites->onEachSide(2)->links('vendor.pagination.motoshop-pagination') }}
            </div>
            <div class="block-pagination d-block d-lg-none">
                {{ $favorites->onEachSide(0)->links('vendor.pagination.motoshop-pagination') }}
            </div>
            <ul class="list-product">
                @foreach ($favorites as $favorite)
                    @include('frontend.includes.product-preview-card', ['product' => $favorite])
                @endforeach
                @if ($favorites->hasPages() && $favorites->currentPage() != $favorites->lastPage())
                    @include('frontend.includes.product-add-card', ['hashFragment' => '#card-product'])
                @endif
            </ul>
            <div class="block-pagination d-none d-lg-block">
                {{ $favorites->onEachSide(2)->links('vendor.pagination.motoshop-pagination') }}
            </div>
            <div class="block-pagination d-block d-lg-none">
                {{ $favorites->onEachSide(0)->links('vendor.pagination.motoshop-pagination') }}
            </div>
        @else
            <p class="text-center">У Вас немає жодного обраного товару</p>
        @endif
    </div>
</section>
@endsection
