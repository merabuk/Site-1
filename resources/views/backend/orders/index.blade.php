@extends('adminlte::page')

@section('title', $text)

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="mr-3 text-dark">{{ $text }}</h1>
        <div>
            <a class="btn bg-success" href="{{ route('orders.create') }}"><i class="fas fa-plus-circle"></i> Додати замовлення</a>
            <a class="btn bg-warning" href="{{ route('orders.export') }}"><i class="fas fa-download"></i> Экспортувати замовлення</a>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="orders" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Замовник</th>
                            <th>Адреса</th>
                            <th>Товари</th>
                            <th>Сума</th>
                            <th>Менеджер</th>
                            <th>Статус</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        @include('backend.includes.orders.row', ['order' => $order])
                        @empty
                            <tr>
                                <td colspan="8">Записи відсутні</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@push('js')
<script>
    $(document).ready(function() {
        $('#orders').DataTable({
            stateSave: true,
            language: {
            url: '{{ asset("/js/backend/plugins/datatables/lang.json") }}'
            },
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [-1] //Отключение сортировки по последнему полю (-1 - первое справа)
            }],
        });
    } );
</script>
@endpush
