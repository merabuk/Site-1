<tr>
    <td>{{ $filter->name ?? 'Немає назви фільра' }}</td>
    <td>
        @foreach ($filter->categories as $category)
            <span class="badge bg-primary">{{ $category->name }}</span>
        @endforeach
    </td>
    <td class="text-center">
        @if ($filter->is_active)
        <i class="fas fa-check-circle text-success"></i>
        @else
        <i class="fas fa-times-circle text-danger"></i>
        @endif
    </td>
    <td class="text-right text-nowrap">
        <a class="btn btn-info btn-sm" href="{{ route('filters.edit', $filter->id)}}">
            <i class="fas fa-pencil-alt"></i>
        </a>
        <btn-confirm-sweet type="danger"
            btn-icon="fas fa-trash"
            title="Видалити"
            text="Видалити {{ $filter->name ?? 'обраний' }} фільтр?"
            action-url="{{ route('filters.destroy', $filter->id)}}"
            action-method="delete"></btn-confirm-sweet>
    </td>
</tr>
