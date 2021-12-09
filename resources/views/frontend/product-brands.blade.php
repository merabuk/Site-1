@extends('layouts.app')

@section('title', 'Бренди')

@section('content')
@include('frontend.includes.breadcrumb', ['crumb' => 'Бренди'])
<div class="maine page-brands">
    <div class="section-brands">
        <div class="container">
            <h3 class="title-section title-section-2">Бренди</h3>
            <product-brand :json-brands="{{ $brands }}"
                typed-slug="{{ $currentBrand }}"
                v-on:change-brand="changeBrand"></product-brand>
        </div>
    </div>
    @if (!empty($products) && $products->isNotEmpty())
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
<script type="text/javascript">
    $(document).ready(function(){
        let hash = $(location).attr('href');
        hash = hash.indexOf('=');
        hash++;
        let slug = $(location).attr('href').slice(hash);
        // console.log(slug);
        $('.pills-wrapper > .nav-pills a[href="#'+slug+'"]').trigger('click');
   });
</script>
@endsection
