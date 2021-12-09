<li class="item-card-product item-card-product-grid @if($product->mainImage->isEmpty()) item-card-product-grid-2 @endif">
    <div class="block-img">
        @if($product->mainImage->isNotEmpty())
            <img src="{{ asset('storage/'.$product->mainImage->first()->path) }}" alt="photo-product" class="img img-fluid">
        {{-- @else
            <img src="{{ asset('/images/backend/no-image.png') }}" alt="photo-product" class="img img-fluid"> --}}
        @endif
    </div>
    <div class="block-title-product">
        <h2 class="title-product">{{ $product->pivot->name }}</h2>
        <span class="article">Артікул: {{ $product->pivot->article }}</span>
    </div>
    <div class="block-add-product">
        <span class="name-line">Кількість (шт)</span>
        <span class="number">{{ $product->pivot->count }}</span>
    </div>
    <div class="d-flex d-lg-block">
        <span class="name-line">Сума (грн.)</span>
        <div class="block-sum">
            <span class="sum">{{ $product->pivot->price }}</span>
            <span class="currency"> грн.</span>
        </div>
    </div>
    <ul class="list-attributes">
        @if (isset($product->pivot->size))
            <li><span>Розмір : </span><span>{{ $product->pivot->size }}</span></li>
        @endif
        @if (isset($product->pivot->direction))
            <li><span>Напрямок  : </span><span>{{ $product->pivot->direction }}</span></li>
        @endif
        @if (isset($product->pivot->color))
            <li><span>Колір : </span><span>{{ $product->pivot->color }}</span></li>
        @endif
        @if (isset($product->pivot->sex))
            <li><span>Стать  : </span><span>{{ $product->pivot->sex }}</span></li>
        @endif
        @if (isset($product->pivot->material))
            <li><span>Матеріал :</span><span>{{ $product->pivot->material }}</span></li>
        @endif
        @if (isset($product->pivot->season))
            <li><span>Сезон  : </span><span>{{ $product->pivot->season }}</span></li>
        @endif
    </ul>
</li>
