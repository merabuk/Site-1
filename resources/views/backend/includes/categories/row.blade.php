@php
if ($parent_name) {
$name_prefix = $parent_name.' ❯ ';
} else {
$name_prefix = '';
}
@endphp
@if ($loop->depth <= 2)
    <tr>
        <td>{{ $name_prefix}}{{ $category->name ?? '' }}</td>
        <td class="text-center">
            @if ($category->is_active)
            <i class="fas fa-check-circle text-success"></i>
            @else
            <i class="fas fa-times-circle text-danger"></i>
            @endif
        </td>
        <td class="text-right text-nowrap">
            <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category->slug)}}">
                <i class="fas fa-pencil-alt">
                </i>
            </a>
            <btn-confirm-sweet type="danger"
                btn-icon="fas fa-trash"
                title="Видалити"
                text="Видалити {{ $category->name ?? 'обрану' }} категорію?"
                action-url="{{ route('categories.destroy', $category->slug)}}"
                action-method="delete"></btn-confirm-sweet>
        </td>
    </tr>
    @forelse ($category->categories as $subcategory)
    @include('backend.includes.categories.row', ['category' => $subcategory, 'parent_name' =>
    $name_prefix.$category->name])
    @empty

    @endforelse
@endif
