@extends('adminlte::page')

@section('title', 'Редагувати замовлення')

@section('content_header')
    <h1 class="m-0 text-dark">Редагувати замовлення</h1>
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
                                @if($errors->first('user_id') || $errors->first('surname') || $errors->first('name') || $errors->first('patronymic') || $errors->first('email') || $errors->first('phone') || $errors->first('city') || $errors->first('address') || $errors->first('pikup') || $errors->first('comment') || $errors->first('status_id'))
                                    @include('backend.includes.menu-red-point')
                                @endif
                                <span>Дані</span>
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
                        <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="tab-content p-0">
                                <div class="tab-pane active" id="main">
                                {{-- Содержимое основной вкладки --}}
                                    {{-- Заказчик из базы --}}
                                    <div class="form-group">
                                        <label for="user_id" class="red-star">Замовник</label>
                                        <select id="user_id"
                                            class="form-control d-none @error('user_id') is-invalid @enderror"
                                            name="user_id">
                                            <option @if (old('user_id', $order->user_id)=='' ) selected @endif
                                                value=''>Обрати замовника
                                            </option>
                                            @foreach ($users as $user)
                                            <option @if (old('user_id', $order->user_id)==$user->id) selected
                                                @endif
                                                value="{{ $user->id }}">{{ $user->surname }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Заказчик вручную ввод --}}
                                    <div class="form-group">
                                        <label for="surname">Прізвище</label>
                                        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old('surname', $order->surname) }}" placeholder="Введіть прізвище">
                                        @error('surname')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="red-star">Ім'я</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $order->name) }}" placeholder="Введіть ім'я">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="patronymic">По батькові</label>
                                        <input type="text" class="form-control @error('patronymic') is-invalid @enderror" id="patronymic" name="patronymic" value="{{ old('patronymic', $order->patronymic) }}" placeholder="Введіть по батькові">
                                        @error('patronymic')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $order->email) }}" placeholder="Введіть E-Mail">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="red-star">Телефон</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $order->phone) }}" placeholder="Введіть номер телефону">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Місто --}}
                                    <div class="form-group">
                                        <label for="city" class="red-star">Місто доставки</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            id="city" name="city" value="{{ old('city', $order->city) }}" placeholder="Введіть місто">
                                        @error('city')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Адрес --}}
                                    <div class="form-group">
                                        <label for="address" class="red-star">Адреса доставки</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            id="address" name="address" value="{{ old('address', $order->address) }}" placeholder="Введіть адресу">
                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Самовывоз --}}
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="pikup"
                                                name="pikup" value="1" @if (old('pikup', $order->pikup)) checked @endif>
                                            <label class="custom-control-label" for="pikup">Самовивіз</label>
                                        </div>
                                        @error('pikup')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Менеджер --}}
                                    <div class="form-group">
                                        <label for="manager_id">Менеджер</label>
                                        <select class="custom-select @error('confirm') is-invalid @enderror" name="manager_id" id="manager_id">
                                            <option value="">Не обрано</option>
                                            @foreach ($managers as $manager)
                                                    <option value="{{ $manager->id }}" @if ($order->manager_id == $manager->id) selected="selected" @endif>{{ $manager->full_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('manager_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Коментарий --}}
                                    <div class="form-group">
                                        <label for="description">Коментар</label>
                                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="comment" name="comment"
                                            rows="3" placeholder="Коментар до замовлення">{{ old('comment', $order->comment) }}</textarea>
                                        @error('comment')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Статус --}}
                                    <div class="form-group">
                                        <label for="status_id" class="red-star">Статус замовлення</label>
                                        <select id="status_id"
                                            class="form-control d-none @error('status_id') is-invalid @enderror"
                                            name="status_id">
                                            @foreach ($statuses as $status)
                                            <option @if (old('status_id', $order->status->id)==$status->id) selected
                                                @endif
                                                value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('status_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Содержимое вкладки Продукты --}}
                                <div class="tab-pane table-responsive" id="product">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mr-3 text-dark">Сума: {{ $order->total_price }} грн.</h5>
                                        <a class="btn bg-success mb-2" href="{{ route('order-products.create', $order->id) }}"><i class="fas fa-plus-circle"></i> Додати товар</a>
                                    </div>
                                    <table id="products" class="table table-striped table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>Зображення</th>
                                                <th>Артикул</th>
                                                <th>Назва</th>
                                                <th>Характеристики</th>
                                                <th>Ціна</th>
                                                <th>Кількість</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($order_products as $order_product)
                                            @include('backend.includes.orders.product', ['order_product' => $order_product])
                                            @empty
                                                <tr>
                                                    <td colspan="8">Записи відсутні</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Редагувати</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-default">Відміна</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('plugins.Select2', true)
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('js')
<script>
    $(document).ready(function() {
        $('#user_id').select2(
                {
                    theme: 'bootstrap4',
                    allowClear: true,
                    placeholder: "Оберіть замовника з бази, або введіть дані замовника нижче",
                    language: "uk"
                }
        );

        $('#status_id').select2(
            {
                theme: 'bootstrap4',
                placeholder: "Оберіть статус",
                language: "uk"
            }
        );

        $('#user_id').on('change', function (e) {
                if ($('#user_id').val()) {
                    $('#surname, #name, #patronymic, #email, #phone').attr('disabled', 'disabled').val('');
                } else {
                    $('#surname, #name, #patronymic, #email, #phone').removeAttr('disabled');
                };
            });

            if ($('#user_id').val()) {
                    $('#surname, #name, #patronymic, #email, #phone').attr('disabled', 'disabled').val('');
                } else {
                    $('#surname, #name, #patronymic, #email, #phone').removeAttr('disabled');
                };

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
