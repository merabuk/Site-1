<li class="item-product {{ ($product->quantity == 0) ? 'block-not-product' : '' }}" id="card-product{{ $loop->iteration }}">
    <div class="block">
        @if ($product->quantity == 0)
            <div class="text-not-product">Немає в наявності</div>
        @else
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
        @endif
        <button-favorite :status="{{ $product->checkFavoritProduct() ? 'true' : 'false' }}"
            :product-id="{{ $product->id }}" :switch-disable="switchDisable"></button-favorite>
        <a href="{{ route('card-product', $product->id) }}" class="link-product">
            @if($product->mainImage->isNotEmpty())
                <img src="{{ asset('storage/'.$product->mainImage->first()->path) }}"
                    data-srcset="{{ asset('storage/'.$product->mainImage->first()->path) }}"
                    srcset="{{ asset('/images/backend/no-image.png') }}" alt="photo-product" class="img img-fluid">
            @else
                <img src="{{ asset('/images/backend/no-image.png') }}" alt="photo-product" class="img img-fluid">
            @endif
            <span class="name-product">{{ $product->name ?? 'Назва товару'}}</span>
            {{-- <span class="name-product">{{ $product->model ?? 'Модель товару'}}</span> --}}
            <span class="price">
                @guest
                    @if ($product->getActualPriceByRole() != $product->price)
                        <span class="sum text-secondary text-line-through">{{ $product->price }}<span> грн.</span></span>
                    @endif
                    <span class="sum">{{ $product->getActualPriceByRole() }}</span><span>грн.</span>
                @endguest
                @auth
                    @if ($product->getActualPriceByRole() != $product->price && !auth()->user()->hasRole('dealer'))
                        <span class="sum text-secondary text-line-through">{{ $product->price }}<span> грн.</span></span>
                    @endif
                    <span class="sum">{{ $product->getActualPriceByRole() }}</span><span>грн.</span>
                @endauth
            </span>
            @if ($product->quantity != 0)
                <span class="block-icon-eye"><span class="icon icon-eye"></span></span>
            @endif
        </a>
    </div>
    <div class="bottom-block-product">
        <button-add-cart :product="{{ $product }}" :price="{{ $product->price }}"
            :actual-price="{{ $product->getActualPriceByRole() }}"
            :actual-discount="{{ $product->actual_discount ? 'true' : 'false' }}"></button-add-cart>
        <buy-one-click-preview-modal :product="{{ $product }}" captcha-src="{{ captcha_src() }}"></buy-one-click-preview-modal>
    </div>
</li>
