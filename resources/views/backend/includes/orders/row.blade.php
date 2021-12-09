<tr>
    <td>
        {{ $order->id }}
    </td>
    <td>
        @if ($order->user()->exists())
            <div>{{ $order->user->full_name ?? '' }}</div>
            <div>{{ $order->user->phone ?? '' }}</div>
        @else
            <div><i class="fas fa-user-secret text-primary" title="Замовник не зареєстрований на сайті"></i> {{ $order->surname ?? '' }} {{ $order->name ?? '' }} {{ $order->patronymic ?? '' }}</div>
            <div>{{ $order->phone ?? '' }}</div>
        @endif
    </td>
    <td>
        @isset($order->city)
            <div>{{ $order->city ?? '' }}</div>
        @endisset
        @isset($order->address)
            <div>{{ $order->address ?? '' }}</div>
        @endisset
        @if($order->pikup)
            <div>Самовивіз</div>
        @endif
    </td>
    <td>
        {{ $order->total_count ?? '' }} шт.
    </td>
    <td>
        {{ $order->total_price ?? '0' }} грн.
    </td>
    <td>
        @if ($order->manager)
            <span class="badge badge-primary">{{ $order->manager->full_name }}</span>
        @else
            <span class="badge badge-warning">Менеджера не призначено</span>
        @endif
    </td>
    <td>
        {{ $order->status->name ?? '' }}
    </td>
    <td class="text-right text-nowrap">
        <a class="btn btn-info btn-sm" href="{{ route('orders.edit', $order->id)}}">
            <i class="fas fa-pencil-alt"></i>
        </a>
        <btn-confirm-sweet type="danger"
            btn-icon="fas fa-trash"
            title="Видалити"
            text="Видалити замовлення № {{ $order->id }}?"
            action-url="{{ route('orders.destroy', $order->id)}}"
            action-method="delete"></btn-confirm-sweet>
    </td>
</tr>
