<tr id="id{{ $product->id }}">
    <td class="d-none">
        {{ $product->id }}
    </td>
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
</tr>
