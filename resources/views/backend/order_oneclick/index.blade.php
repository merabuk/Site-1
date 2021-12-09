@extends('adminlte::page')

@section('title', 'Замовлення в один клік')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="mr-3 text-dark">Замовлення в один клік</h1>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="oneclick" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Замовник</th>
                            <th>Телефон</th>
                            <th>Товари</th>
                            <th>Сума</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders_oneclick as $order_oneclick)
                        @include('backend.includes.order_oneclick.row', ['order_oneclick' => $order_oneclick])
                        @empty
                            <tr>
                                <td colspan="6">Записи відсутні</td>
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
        $('#oneclick').DataTable({
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
