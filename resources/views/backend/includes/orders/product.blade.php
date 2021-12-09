<tr>
    <td>
        @isset($order_product->product_id)
            @if ($order_product->product->mainImage->isNotEmpty())
                <img class="img-thumbnail thumb-index" src="{{ asset('storage/'.$order_product->product->mainImage->first()->path) }}">
            @endif
        @endisset
    </td>
    <td>
        @if ($order_product->product_id)
            {{ $order_product->product->article ?? '' }}
        @else
            <s>{{ $order_product->article ?? '' }}</s>
        @endif
    </td>
    <td>
        @if ($order_product->product_id)
            <a href="{{ route('card-product', $order_product->product_id) }}">{{ $order_product->product->name }}</a>
        @else
            <s>{{ $order_product->name ?? '' }}</s>
        @endif
    </td>
    <td>
        @isset($order_product->color)
            <span class="badge badge-primary">{{ $order_product->color }}</span>
        @endisset
        @isset($order_product->size)
            <span class="badge badge-primary">{{ $order_product->size }}</span>
        @endisset
        @isset($order_product->material)
            <span class="badge badge-primary">{{ $order_product->material }}</span>
        @endisset
        @isset($order_product->direction)
            <span class="badge badge-primary">{{ $order_product->direction }}</span>
        @endisset
        @isset($order_product->sex)
            <span class="badge badge-primary">{{ $order_product->sex }}</span>
        @endisset
        @isset($order_product->season)
            <span class="badge badge-primary">{{ $order_product->season }}</span>
        @endisset
    </td>
    <td>{{ $order_product->price ?? '' }}</td>
    <td>{{ $order_product->count ?? '' }}</td>
    <td class="text-right text-nowrap">
        @isset ($order_product->product_id)
            <a class="btn btn-info btn-sm" href="{{ route('order-products.edit', [$order_product->order->id, $order_product->id])}}">
                <i class="fas fa-pencil-alt"></i>
            </a>
        @endisset
        <btn-confirm-sweet type="danger"
            btn-icon="fas fa-trash"
            title="Видалити"
            text="Видалити обраний товар із замовлення?"
            action-url="{{ route('order-products.destroy', [$order_product->order->id, $order_product->id] )}}"
            action-method="delete"></btn-confirm-sweet>
    </td>
</tr>
