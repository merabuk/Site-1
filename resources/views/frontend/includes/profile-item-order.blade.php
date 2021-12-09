<div class="card">
    <div class="card-header" id="heading{{ $order->id }}">
        <h5 class="mb-0">
            <button class="btn btn-link @if(!$loop->last) collapsed @endif" data-toggle="collapse" data-target="#collapse{{ $order->id }}" aria-expanded="true" aria-controls="collapse{{ $order->id }}">
                <span class="block-header-order">
                    <span class="number-status-order">
                        <span class="number-order">№ {{ $order->id }} от {{ date('d.m.y', strtotime($order->created_at)) }}</span>
                        <span class="status-order">{{ $order->status->name }}</span>
                    </span>
                    <span class="total-number">
                        <span>Загалом товарів : <span class="number-order">{{ $order->total_count }}</span></span>
                    </span>
                    <span class="total-sum">
                        <span>Сума:<span class="sum">{{ $order->total_price }}</span>грн.</span>
                    </span>
                </span>
                <span class="icon icon-arrow-down"></span>
            </button>
        </h5>
    </div>
    <div id="collapse{{ $order->id }}" class="collapse @if($loop->last) show @endif" aria-labelledby="heading{{ $order->id }}" data-parent="#accordion">
        <div class="card-body">
            <div class="content-card-body">
                <div class="info-order">
                    <span class="title">Інформація про заказ</span>
                    <ul class="list-info-order">
                        <li>{{ $order->last_name ?? $order->user->surname }}</li>
                        <li>{{ $order->name  ?? $order->user->name }}</li>
                        <li>{{ $order->email ?? $order->user->email }}</li>
                        <li>{{ $order->phone ?? $order->user->phone }}</li>
                        <li>{{ $order->city ?? $order->user->city }}</li>
                        <li>{{ $order->address ?? $order->user->address }}</li>
                    </ul>
                </div>
                <div class="order"  style="width: 100%">
                    <ul class="list-card-product">
                        @if ($order->products->isNotEmpty())
                            @foreach ($order->products as $product)
                                @include('frontend.includes.profile-order-item-product', ['product' => $product])
                            @endforeach
                        @elseif ($order->orders_products->isNotEmpty())
                            @foreach ($order->orders_products as $product)
                                @include('frontend.includes.profile-order-item-product-del', ['product' => $product])
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="total">
                <div class="container block-total">
                    <div class="block-number">
                        <span>Загалом товарів: </span><span class="number">{{ $order->total_count }}</span>
                    </div>
                    <div class="block-sum">
                        <span class="d-none d-md-inline-block">Сума:</span>
                        <span class="total-sum">{{ $order->total_price }}</span>
                        <span> грн.</span>
                    </div>
                    <form action="{{ route('order-repeat', ['user' => $user->id, 'order' => $order->id]) }}" method="POST">
                    @csrf
                        <button type="submit" class="btn-custom-project">Повторити замовлення</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
