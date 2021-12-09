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
    <td>{{ $product->actual_price ?? '' }}</td>
    <td>
        @isset($product->pivot->color)
            <span class="d-block">Колір: <b>{{ $product->pivot->color }}</b></span>
        @endisset
        @isset($product->pivot->size)
            <span class="d-block">Розмір: <b>{{ $product->pivot->size }}</b></span>
        @endisset
        @isset($product->pivot->material)
            <span class="d-block">Матеріал: <b>{{ $product->pivot->material }}</b></span>
        @endisset
        @isset($product->pivot->direction)
            <span class="d-blocke">Напрямок: <b>{{ $product->pivot->direction }}</b></span>
        @endisset
        @isset($product->pivot->sex)
            <span class="d-block">Стать: <b>{{ $product->pivot->sex }}</b></span>
        @endisset
        @isset($product->pivot->season)
            <span class="d-block">Сезонність: <b>{{ $product->pivot->season }}</b></span>
        @endisset
    </td>
    <td>
        {{ $product->pivot->count ?? '' }}
    </td>
</tr>
