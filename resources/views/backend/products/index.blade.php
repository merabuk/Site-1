@extends('adminlte::page')

@section('title', 'Товари')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="mr-3 text-dark">Товари</h1>
        <div>
            <a class="btn bg-success" href="{{ route('products.create') }}"><i class="fas fa-plus-circle"></i> Додати товар</a>
            <a class="btn bg-warning" href="{{ route('products.import') }}"><i class="fas fa-upload"></i> Імпортувати товари</a>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="products" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Зображення</th>
                            <th>Артикул</th>
                            <th>Назва</th>
                            <th>Ціна</th>
                            <th>Знижка</th>
                            <th>Ціна зі знижкою</th>
                            <th>Кількість</th>
                            <th>Опубліковано</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        @include('backend.includes.products.row', ['product' => $product])
                        @empty
                            <tr>
                                <td colspan="9">Записи відсутні</td>
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
        $('#products').DataTable({
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
