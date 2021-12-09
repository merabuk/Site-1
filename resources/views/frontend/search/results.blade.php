@extends('layouts.app')

@section('title')
Результати пошуку
@endsection

@section('content')
<div class="block-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Головна сторінка</a></li>
                <li class="breadcrumb-item active" aria-current="page">Пошук</li>
            </ol>
        </nav>
    </div>
</div>
<section class="section-favorit-product">
    <div class="container">
        <h3 class="title-section title-section-2">Результати пошуку</h3>
        <div class="block-filter-product">
            <div class="left">
                @include('frontend.includes.select.sort')
            </div>
            <div class="right d-none d-lg-flex">
                @include('frontend.includes.select.count')
            </div>
        </div>
        @if ($searched && $searched->count())
            <div class="block-pagination d-none d-lg-block">
                {{ $searched->onEachSide(2)->links('vendor.pagination.motoshop-pagination') }}
            </div>
            <div class="block-pagination d-block d-lg-none">
                {{ $searched->onEachSide(0)->links('vendor.pagination.motoshop-pagination') }}
            </div>
            <ul class="list-product">
                @foreach ($searched as $product)
                    @include('frontend.includes.product-preview-card', ['product' => $product,
                                                                        'avg_product' => $avg_product,
                                                                        'id' => $loop->iteration])
                @endforeach
                @if ($searched->hasPages() && $searched->currentPage() != $searched->lastPage())
                    @include('frontend.includes.product-add-card', ['hashFragment' => '#card-product'])
                @endif
            </ul>
            <div class="block-pagination d-none d-lg-block">
                {{ $searched->onEachSide(2)->links('vendor.pagination.motoshop-pagination') }}
            </div>
            <div class="block-pagination d-block d-lg-none">
                {{ $searched->onEachSide(0)->links('vendor.pagination.motoshop-pagination') }}
            </div>
        @else
            <p class="text-center">Нажаль не знайдено жодного товару...</p>
        @endif
    </div>
</section>
@endsection
