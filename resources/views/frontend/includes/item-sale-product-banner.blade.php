<li class="item-sale-product">
    <div class="wrapper-block-item-sale-product">
        <div class="block-item-sale-product product-1"
             style="background-image: url({{ $product->mainImage->isNotEmpty()
            ? asset('storage/'.$product->mainImage->first()->path)
            : asset('/images/backend/no-image.png') }});
                 background-repeat: no-repeat; background-size: auto 100%;">
        </div>
        <div class="block-text">
            <span>{{ $product->brand->name ?? 'Назва бренду' }}</span>
            <span class="title">{{ $product->name ?? 'Назва продукту' }}</span>
            <span class="text-wrap text-break text-truncate" style="height: 54px">{{ $product->details ?? '' }}</span>
            <button onclick="event.preventDefault; window.location.href = '{{ route('card-product', $product->id) }}'">Детальніше</button>
        </div>
    </div>
</li>
