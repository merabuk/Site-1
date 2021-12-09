@extends('adminlte::page')

@section('title', 'Замовлення в один клік')

@section('content_header')
    <h1 class="m-0 text-dark">Замовлення в один клік</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#main" data-toggle="tab">
                                <span>Замовник</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product" data-toggle="tab">
                                <span>Товари</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form>
                            <div class="tab-content p-0">
                                <div class="tab-pane active" id="main">
                                {{-- Содержимое основной вкладки --}}
                                    {{-- Номер --}}
                                    <div class="form-group">
                                        <label for="id">Номер</label>
                                        <input type="text" class="form-control" value="{{ $orderOneclick->id ?? "Номер відсутній" }}" disabled>
                                    </div>
                                    {{-- Заказчик --}}
                                    <div class="form-group">
                                        <label for="name">Замовник</label>
                                        <input type="text" class="form-control" value="{{ $orderOneclick->name ?? "Ім'я відсутнє" }}" disabled>
                                    </div>
                                    {{-- Телефон --}}
                                    <div class="form-group">
                                        <label for="phone">Телефон</label>
                                        <input type="text" class="form-control" value="{{ $orderOneclick->phone ?? "Телефон відсутній" }}" disabled>
                                    </div>
                                </div>
                                {{-- Содержимое вкладки Продукты --}}
                                <div class="tab-pane table-responsive" id="product">
                                    <div class="d-flex justify-content-start">
                                        <h5 class="mr-3 text-dark">Сума: {{ $orderOneclick->total_price }} грн.</h5>

                                    </div>
                                    <table id="products" class="table table-striped table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>Зображення</th>
                                                <th>Артикул</th>
                                                <th>Назва</th>
                                                <th>Ціна</th>
                                                <th>Характеристики</th>
                                                <th>Кількість</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orderOneclick->products->load(['mainImage']) as $product)
                                            @include('backend.includes.order_oneclick.product', ['product' => $product])
                                            @empty
                                                <tr>
                                                    <td colspan="8">Записи відсутні</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="{{ route('order-oneclicks.index') }}" class="btn btn-primary">Закрити</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('js')
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
    });
</script>
@endsection
