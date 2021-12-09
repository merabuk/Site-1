@extends('adminlte::page')

@section('title', 'Додати товар у замовлення')

@section('content_header')
    <h1 class="m-0 text-dark">Додати товар у замовлення</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <form action="{{ route('order-products.store', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {{-- Товар --}}
                        <div class="form-group">
                            <label class="red-star">Товар</label>
                            <table id="order_products" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th class="d-none">ID</th>
                                        <th>Зображення</th>
                                        <th>Артикул</th>
                                        <th>Назва</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    @include('backend.includes.order_products.row', ['product' => $product])
                                    @empty
                                        <tr>
                                            <td colspan="3">Записи відсутні</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @error('product_id')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- Id выбранного продукта --}}
                        <input type="hidden" name="product_id" id="product_id" value="">
                        {{-- Количество товара --}}
                        <div class="form-group">
                            <label for="count" class="red-star">Кількість</label>
                            <input type="number" min="1" step="1"
                                class="form-control @error('count') is-invalid @enderror" id="count"
                                name="count" value="{{ old('count', 1) }}"
                                placeholder="Введіть кількість">
                            @error('count')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- Цвет --}}
                        <div class="form-group">
                            <label for="color" class="red-star">Колір</label>
                            <select id="color" class="form-control select2 d-none @error('color') is-invalid @enderror" name="color"></select>
                            @error('color')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- Размер товара --}}
                        <div class="form-group">
                            <label for="size" class="red-star">Розмір</label>
                            <select id="size" class="form-control select2 d-none @error('size') is-invalid @enderror" name="size"></select>
                            @error('size')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- Материал товара --}}
                        <div class="form-group">
                            <label for="material" class="red-star">Матеріал</label>
                            <select id="material" class="form-control select2 d-none @error('material') is-invalid @enderror" name="material"></select>
                            @error('material')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- Направление товара --}}
                        <div class="form-group">
                            <label for="direction" class="red-star">Напрямок</label>
                            <select id="direction" class="form-control select2 d-none @error('direction') is-invalid @enderror" name="direction"></select>
                            @error('direction')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- Пол товара --}}
                        <div class="form-group">
                            <label for="sex" class="red-star">Стать</label>
                            <select id="sex" class="form-control select2 d-none @error('sex') is-invalid @enderror" name="sex"></select>
                            @error('sex')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- Сезонность товара --}}
                        <div class="form-group">
                            <label for="season" class="red-star">Сезонність</label>
                            <select id="season" class="form-control select2 d-none @error('season') is-invalid @enderror" name="season"></select>
                            @error('season')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Додати</button>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-default">Відміна</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@push('js')
<script>
    $(document).ready(function() {
        var table = $('#order_products').DataTable({
            //stateSave: true,
            select: {
                style: 'single'
            },
            "lengthMenu": [ 3, 5, 10, 25, 50, 100 ],
            "pageLength": 3,
            language: {
            url: '{{ asset("/js/backend/plugins/datatables/lang.json") }}'
            },
        });
        //Old values
        var old = @json(session()->getOldInput());
        //Выделить выбранную строку при загрузке или при валидации
        table.one('draw', function () {
            table.row('#id'+ old.product_id).show().draw(false);
            table.row('#id'+ old.product_id).select();
        });

        //Список характеристик товаров
        var options = ['color', 'size', 'material', 'direction', 'sex', 'season'];
        //Поиск продукта при выборе
        table.on('select', function (e, dt, type, indexes) {
            let products = @json($products);
            let selected = products.find(product => product.id == table.row(indexes[0]).data()[0]);
            if (selected) {
                //Выбранный товар
                $('#product_id').val(selected.id);
                //Обработка характеристик
                options.forEach(
                    option => {
                        $(`#${option}`).empty();
                        if (selected[option]) {
                            $(`#${option}`).removeAttr('disabled');
                            selected[option].forEach(opt => {
                                if (opt == old[option]) {
                                    var is_selected = 'selected';
                                } else {
                                    var is_selected = '';
                                }
                                $(`#${option}`).append(`<option value="${opt}" ${is_selected}>${opt}</option>`)
                            });
                        } else {
                            $(`#${option}`).empty();
                            $(`#${option}`).attr('disabled', 'disabled');
                        };
                    }
                );

            };
        });

        $("#color").select2(
                {
                    theme: 'bootstrap4',
                    placeholder: {
                        id: '-1',
                        text: 'Оберіть колір',
                        selected:'selected',
                    },
                    language: "uk",
                }
        );

        $("#size").select2(
                {
                    theme: 'bootstrap4',
                    placeholder: {
                        id: '-1',
                        text: 'Оберіть розмір',
                        selected:'selected',
                    },
                    language: "uk",
                }
        );

        $("#material").select2(
                {
                    theme: 'bootstrap4',
                    placeholder: {
                        id: '-1',
                        text: 'Оберіть матеріал',
                        selected:'selected',
                    },
                    language: "uk",
                }
        );

        $("#direction").select2(
                {
                    theme: 'bootstrap4',
                    placeholder: {
                        id: '-1',
                        text: 'Оберіть напрямок',
                        selected:'selected',
                    },
                    language: "uk",
                }
        );

        $("#sex").select2(
                {
                    theme: 'bootstrap4',
                    placeholder: {
                        id: '-1',
                        text: 'Оберіть стать',
                        selected:'selected',
                    },
                    language: "uk",
                }
        );

        $("#season").select2(
                {
                    theme: 'bootstrap4',
                    placeholder: {
                        id: '-1',
                        text: 'Оберіть сезон',
                        selected:'selected',
                    },
                    language: "uk",
                }
        );
    } );
</script>
@endpush
