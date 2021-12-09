@extends('adminlte::page')

@section('title', 'Створити користувача')

@section('content_header')
    <h1 class="m-0 text-dark">Створити користувача</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="surname" class="red-star">Прізвище</label>
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
                                <label for="email" class="red-star">E-Mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Введіть E-Mail">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="red-star">Пароль</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Введіть пароль">
                                    <div class="input-group-append">
                                        <button type="button" class="input-group-text" onclick="showPassword()">
                                            <i id="eye" class="fas fa-eye"></i>
                                        </button>
                                        <button type="button" class="input-group-text" onclick="generatePassword()">
                                            <i class="fas fa-key"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm" class="red-star">Підтвердження пароля</label>
                                <input type="password" class="form-control @error('confirm') is-invalid @enderror" id="confirm" name="confirm" placeholder="Введіть пароль повторно">
                                @error('confirm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role" class="red-star">Роль</label>
                                <select class="custom-select @error('confirm') is-invalid @enderror" name="role" id="role">
                                    @foreach ($roles as $role)
                                        @if (auth()->user()->roles->first()->rank > $role->rank)
                                            <option value="{{ $role->slug }}">{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="manager_id">Менеджер для ділера</label>
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
                            <div class="form-group">
                                <label for="phone" class="red-star">Телефон</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Введіть номер телефону">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city">Місто</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" placeholder="Введіть місто">
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Адреса</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" placeholder="Введіть адресу">
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Створити</button>
                            <a href="{{ route('users.index') }}" class="btn btn-default">Відміна</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
        var Password = {
            _pattern : /[a-zA-Z0-9_\-\+\.]/,

            _getRandomByte : function()
            {
                if(window.crypto && window.crypto.getRandomValues)
                {
                    var result = new Uint8Array(1);
                    window.crypto.getRandomValues(result);
                    return result[0];
                }
                else if(window.msCrypto && window.msCrypto.getRandomValues)
                {
                    var result = new Uint8Array(1);
                    window.msCrypto.getRandomValues(result);
                    return result[0];
                }
                else
                {
                    return Math.floor(Math.random() * 256);
                }
            },

            generate : function(length)
            {
            return Array.apply(null, {'length': length})
                .map(function()
                {
                var result;
                while(true)
                {
                    result = String.fromCharCode(this._getRandomByte());
                    if(this._pattern.test(result))
                    {
                    return result;
                    }
                }
                }, this)
                .join('');
            }
        };

        function generatePassword()
        {
            $('#password, #confirm').val(Password.generate(8));
        };
        function showPassword()
        {
            if ($('#password').attr('type') == 'password'){
                $('#eye').removeClass('fa-eye').addClass('fa-eye-slash');
                $('#password, #confirm').attr('type', 'text');
            } else {
                $('#eye').removeClass('fa-eye-slash').addClass('fa-eye');
                $('#password, #confirm').attr('type', 'password');
            }
        };
        //Менеджер
        $("#role").change(function() {
            if($("#role").val() !== 'dealer') {
                $('#manager_id').attr('disabled', 'disabled');
                $('#manager_id option:first').prop('selected', true);
            } else {
                $('#manager_id').removeAttr('disabled');
            };
        });
        $(document).ready(function() {
            $("#role").change();
        });

    </script>
@endsection
