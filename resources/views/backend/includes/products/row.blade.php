<tr>
    <td>
        @if ($product->mainImage->isNotEmpty())
            <img class="img-thumbnail thumb-index" src="{{ asset('storage/'.$product->mainImage->first()->path) }}">
        @endif
    </td>
    <td>{{ $product->article ?? '' }}</td>
    <td>
        @isset ($product->name)
            <a href="{{ route('card-product', $product->id) }}">{{ $product->name}}</a>
        @endisset
    </td>
    <td>{{ $product->price ?? '' }}</td>
    <td>
        @isset ($product->discount)
            {{ $product->discount}} %
        @endisset
    </td>
    <td>{{ $product->discounted_price ?? '' }}</td>
    <td>
        @switch(true)
            @case($product->quantity < 5)
                <span class="badge badge-danger">{{ $product->quantity }}</span>
                @break
            @case(($product->quantity >= 5 && $product->quantity < 10))
                <span class="badge badge-warning">{{ $product->quantity }}</span>
                @break
            @case(($product->quantity >= 10))
                <span class="badge badge-success">{{ $product->quantity }}</span>
                @break
            @default
                <span class="badge">{{ $product->quantity }}</span>
        @endswitch
    </td>
    <td class="text-center">
        @if ($product->is_active)
            <i class="fas fa-check-circle text-success"></i>
        @else
            <i class="fas fa-times-circle text-danger"></i>
        @endif
    </td>
    <td class="text-right text-nowrap">
        <a class="btn btn-info btn-sm" href="{{ route('products.edit', $product->id)}}">
            <i class="fas fa-pencil-alt"></i>
        </a>
        <btn-confirm-sweet type="danger"
            btn-icon="fas fa-trash"
            title="Видалити"
            text="Видалити {{ $product->name ?? 'обраний' }} товар?"
            action-url="{{ route('products.destroy', $product->id)}}"
            action-method="delete"></btn-confirm-sweet>
    </td>
</tr>
