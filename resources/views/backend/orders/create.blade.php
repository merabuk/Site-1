@extends('adminlte::page')

@section('title', 'Створити замовлення')

@section('content_header')
    <h1 class="m-0 text-dark">Створити замовлення</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            {{-- Заказчик из базы --}}
                            <div class="form-group">
                                <label for="user_id" class="red-star">Замовник</label>
                                <select id="user_id"
                                    class="form-control d-none @error('user_id') is-invalid @enderror"
                                    name="user_id">
                                    <option @if (old('user_id')=='' ) selected @endif
                                        value=''>Обрати замовника
                                    </option>
                                    @foreach ($users as $user)
                                    <option @if (old('user_id')==$user->id) selected
                                        @endif
                                        value="{{ $user->id }}" role="{{ $user->roles->first()->slug }}">{{ $user->full_name }}</option>
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
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old('surname') }}" placeholder="Введіть прізвище">
                                @error('surname')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name" class="red-star">Ім'я</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Введіть ім'я">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="patronymic">По батькові</label>
                                <input type="text" class="form-control @error('patronymic') is-invalid @enderror" id="patronymic" name="patronymic" value="{{ old('patronymic') }}" placeholder="Введіть по батькові">
                                @error('patronymic')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Введіть E-Mail">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone" class="red-star">Телефон</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Введіть номер телефону">
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
                                    id="city" name="city" value="{{ old('city') }}" placeholder="Введіть місто">
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
                                    id="address" name="address" value="{{ old('address') }}" placeholder="Введіть адресу">
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
                                        name="pikup" value="1" @if (old('pikup')) checked @endif>
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
                                            <option value="{{ $manager->id }}">{{ $manager->full_name }}</option>
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
                                    rows="3" placeholder="Коментар до замовлення">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Створити</button>
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
    });

    //Менеджер
    $('#manager_id').select2(
                {
                    theme: 'bootstrap4',
                    allowClear: true,
                    placeholder: "Не обрано",
                    language: "uk"
                }
            );
    /*$("#user_id").change(function() {
            if($(this).find('option:selected').attr('role') !== 'dealer') {
                $('#manager_id').attr('disabled', 'disabled');
                $('#manager_id option:first').prop('selected', true);
            } else {
                $('#manager_id').removeAttr('disabled');
            };
        });
    $(document).ready(function() {
        $("#user_id").change();
    });*/
</script>
@endsection
