@foreach ($product_item['attributes'] as $index => $item)
    <li class="item-card-product">
        <h2 class="title-product"><a class="link-tdn" href="{{ route('card-product', $product_item['product']->id) }}">{{ $product_item['product']->name ?? 'Назва товару'}}</a></h2>
        <span class="article">Артікул: {{ $product_item['product']->article ?? '--' }}</span>
        <div class="block-img">
            @if($product_item['product']->mainImage->isNotEmpty())
                <img src="{{ asset('storage/'.$product_item['product']->mainImage->first()->path) }}" alt="photo-product" class="img">
            @else
                <img src="{{ asset('/images/backend/no-image.png') }}" alt="photo-product" class="img">
            @endif
        </div>
        @if ($product_item['product']->actual_discount)
            <span class="label-product sale">{{$product_item['product']->discount ?? ''}}% Скидка</span>
        @endif
        <div class="price">
            @if ($product_item['product']->actual_price_by_role != $product_item['product']->price)
                <span class="old-price">{{ $product_item['product']->price ?? 'Немає ціни'}} грн.</span>
            @endif
            <span class="new-price">{{ $product_item['product']->actual_price_by_role }} грн.</span>
        </div>
        <cart-action-btn v-bind:product="{{ json_encode($product_item['product']) }}" v-bind:attributes="{{ json_encode($product_item['attributes'][$index]) }}"
            :index-p="{{ $loop->parent->iteration }}" :index="{{ $loop->iteration }}"></cart-action-btn>
        <ul class="list-attributes">
            @if (isset($item['size']))
                <li><span>Розмір : </span><span>{{ $item['size'] }}</span></li>
            @endif
            @if (isset($item['direction']))
                <li><span>Напрямок  : </span><span>{{ $item['direction'] }}</span></li>
            @endif
            @if (isset($item['color']))
                <li><span>Колір : </span><span>{{ $item['color'] }}</span></li>
            @endif
            @if (isset($item['sex']))
                <li><span>Стать  : </span><span>{{ $item['sex'] }}</span></li>
            @endif
            @if (isset($item['material']))
                <li><span>Матеріал :</span><span>{{ $item['material'] }}</span></li>
            @endif
            @if (isset($item['season']))
                <li><span>Сезон  : </span><span>{{ $item['season'] }}</span></li>
            @endif
        </ul>
    </li>
@endforeach
