<tr>
    <td>
        {{ $order_oneclick->id }}
    </td>
    <td>
        {{ $order_oneclick->name ?? "Ім'я відсутнє" }}
    </td>
    <td>
        {{ $order_oneclick->phone ?? "Телефон відсутній" }}
    </td>
    <td>
        {{ $order_oneclick->products->count() }} шт.
    </td>
    <td>
        {{ $order_oneclick->total_price }} грн.
    </td>
    <td class="text-right text-nowrap">
        <a class="btn btn-primary btn-sm" href="{{ route('order-oneclicks.show', $order_oneclick->id)}}">
            <i class="fas fa-eye"></i>
        </a>
        <btn-confirm-sweet type="danger"
            btn-icon="fas fa-trash"
            title="Видалити"
            text="Видалити замовлення в один клік № {{ $order_oneclick->id }}?"
            action-url="{{ route('order-oneclicks.destroy', $order_oneclick->id)}}"
            action-method="delete"></btn-confirm-sweet>
    </td>
</tr>
