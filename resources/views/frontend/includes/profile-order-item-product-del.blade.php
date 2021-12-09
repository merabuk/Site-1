<li class="item-card-product item-card-product-grid item-card-product-grid-2">
    <div class="block-img">
    </div>
    <div class="block-title-product">
        <h2 class="title-product">{{ $product->name }}</h2>
        <span class="article">Артікул: {{ $product->article }}</span>
    </div>
    <div class="block-add-product">
        <span class="name-line">Кількість (шт)</span>
        <span class="number">{{ $product->count }}</span>
    </div>
    <div class="d-flex d-lg-block">
        <span class="name-line">Сума (грн.)</span>
        <div class="block-sum">
            <span class="sum">{{ $product->price }}</span>
            <span class="currency"> грн.</span>
        </div>
    </div>
    <ul class="list-attributes">
        @if (isset($product->size))
            <li><span>Розмір : </span><span>{{ $product->size }}</span></li>
        @endif
        @if (isset($product->direction))
            <li><span>Напрямок  : </span><span>{{ $product->direction }}</span></li>
        @endif
        @if (isset($product->color))
            <li><span>Колір : </span><span>{{ $product->color }}</span></li>
        @endif
        @if (isset($product->sex))
            <li><span>Стать  : </span><span>{{ $product->sex }}</span></li>
        @endif
        @if (isset($product->material))
            <li><span>Матеріал :</span><span>{{ $product->material }}</span></li>
        @endif
        @if (isset($product->season))
            <li><span>Сезон  : </span><span>{{ $product->season }}</span></li>
        @endif
    </ul>
</li>
