<tr>
    <td>
        @if ($brand->mainImage()->exists())
            <img class="img-thumbnail thumb-index" src="{{ asset('storage/'.$brand->mainImage->first()->path) }}">
        @endif
    </td>
    <td>{{ $brand->name ?? '' }}</td>
    <td>{{ $brand->slug ?? '' }}</td>
    <td class="text-center">
        @if ($brand->is_active)
            <i class="fas fa-check-circle text-success"></i>
        @else
            <i class="fas fa-times-circle text-danger"></i>
        @endif
    </td>
    <td class="text-right text-nowrap">
        <a class="btn btn-info btn-sm" href="{{ route('brands.edit', $brand->slug)}}">
            <i class="fas fa-pencil-alt"></i>
        </a>
        <btn-confirm-sweet type="danger"
            btn-icon="fas fa-trash"
            title="Видалити"
            text="Видалити {{ $brand->name ?? 'обраний' }} бренд?"
            action-url="{{ route('brands.destroy', $brand->slug)}}"
            action-method="delete"></btn-confirm-sweet>
    </td>
</tr>
