@extends('layouts.app')

@section('title')
Мій профіль
@endsection

@section('content')
    <section class="section-admin">
        <div class="container">
            <div class="d-lg-flex">
                <h3 class="title-section text-center">Мій профіль</h3>
                <ul class="nav nav-tabs" id="myTab-top" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="personal-info-tab" data-toggle="tab" href="#personal-info" role="tab" aria-controls="personal-info" aria-selected="true">Особисті дані</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Мої замовлення</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="favorite-tab" data-toggle="tab" href="#favorite" role="tab" aria-controls="favorite" aria-selected="false">Обране</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent-top">
                <div class="tab-pane fade" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                    @auth
                        <form class="form-personal-info" action="{{ route('update-admin-personal', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h2 class="title-form">Редагування особистих даних</h2>
                            <div class="form-group row">
                                <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Ваше Прізвище<span class="color-red">*</span></label>
                                <div class="col-sm-7  col-md-8 col-lg-6">
                                    @error('surname') <span class="icon-error"></span>@enderror
                                    <input type="text" class="form-control @error('surname') border-error @enderror" placeholder="Ваше Прізвище"
                                        id="surname" name="surname" value="{{ old('surname', $user->surname) }}">
                                </div>
                                @error('surname') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Ваше Ім'я<span class="color-red">*</span></label>
                                <div class="col-sm-7  col-md-8 col-lg-6">
                                    @error('name') <span class=" icon-error"></span> @enderror
                                    <input type="text" class="form-control @error('name') border-error @enderror" placeholder="Ваше Ім'я"
                                        id="name" name="name" value="{{ old('name', $user->name) }}">
                                </div>
                                @error('name') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Ваше По Батькові</label>
                                <div class="col-sm-7  col-md-8 col-lg-6">
                                    @error('patronymic') <span class="icon-error"></span> @enderror
                                    <input type="text" class="form-control @error('patronymic') border-error @enderror" placeholder="Ваше По Батькові"
                                        id="patronymic" name="patronymic" value="{{ old('patronymic', $user->patronymic) }}">
                                </div>
                                @error('patronymic') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">E-mail<span class="color-red">*</span></label>
                                <div class=" col-sm-7  col-md-8 col-lg-6">
                                    @error('email') <span class="icon-error"></span> @enderror
                                    <input type="email" class="form-control  @error('email') border-error @enderror" aria-describedby="emailHelp"
                                        id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Ваш E-mail">
                                </div>
                                @error('email') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Ваш телефон</label>
                                <div class="col-sm-7  col-md-8 col-lg-6">
                                    @error('phone') <span class="icon-error"></span> @enderror
                                    <input type="tel" class="form-control  @error('phone') border-error @enderror"  placeholder="Ваш телефон"
                                        id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                </div>
                                @error('phone') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <h2 class="title-form">Адреса доставки</h2>
                            <div class="form-group row">
                                <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Місто</label>
                                <div class="col-sm-7  col-md-8 col-lg-6">
                                    @error('city') <span class="icon-error"></span> @enderror
                                    <input type="text" class="form-control @error('city') border-error @enderror"  placeholder="Назва міста"
                                        id="city" name="city" value="{{ old('city', $user->city) }}">
                                </div>
                                @error('city') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Адреса</label>
                                <div class="col-sm-7  col-md-8 col-lg-6">
                                    @error('address') <span class="icon-error"></span> @enderror
                                    <input type="text" class="form-control @error('address') border-error @enderror"  placeholder="Адреса"
                                        id="address" name="address" value="{{ old('address', $user->address) }}">
                                </div>
                                @error('address') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <h2 class="title-form">Змінити пароль</h2>
                            <div class="form-group row">
                                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Поточний  пароль</label>
                                <div class="col-sm-7  col-md-8 col-lg-6">
                                    @error('old-password') <span class="icon-error"></span> @enderror
                                    <input type="password" class="form-control @error('old-password') border-error @enderror"  placeholder="********"
                                        id="old-password" name="old-password">
                                </div>
                                @error('old-password') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Новий пароль</label>
                                <div class="col-sm-7  col-md-8 col-lg-6">
                                    @error('new-password') <span class="icon-error"></span> @enderror
                                    <input type="password" class="form-control @error('new-password') border-error @enderror" placeholder="********"
                                        id="new-password" name="new-password">
                                </div>
                                @error('new-password') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Повторити новий пароль</label>
                                <div class="col-sm-7  col-md-8 col-lg-6">
                                    @error('confirm') <span class="icon-error"></span> @enderror
                                    <input type="password" class="form-control @error('confirm') border-error @enderror"  placeholder="********"
                                        id="confirm" name="confirm">
                                </div>
                                @error('confirm') <span class="text-error col- col-lg-3">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn-custom-project">Зберегти</button>
                        </form>
                    @endauth
                </div>
                <div class="tab-pane fade tab-admin-orders" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    @if ($orders->isNotEmpty())
                        <div id="accordion">
                            @foreach ($orders as $order)
                                @include('frontend.includes.profile-item-order', ['order' => $order])
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">У Вас немає жодного заказу</p>
                    @endif
                </div>
                <div class="tab-pane fade mt-3" id="favorite" role="tabpanel" aria-labelledby="favorite-tab">
                    @if ($favorites && $favorites->isNotEmpty())
                        <div class="block-filter-product">
                            <div class="left">
                                @include('frontend.includes.select.sort')
                            </div>
                            <div class="right d-none d-lg-flex">
                                @include('frontend.includes.select.count')
                            </div>
                        </div>
                        <div class="block-pagination d-none d-lg-block">
                            {{ $favorites->onEachSide(2)->links('vendor.pagination.motoshop-pagination') }}
                        </div>
                        <div class="block-pagination d-block d-lg-none">
                            {{ $favorites->onEachSide(0)->links('vendor.pagination.motoshop-pagination') }}
                        </div>
                        <ul class="list-product">
                            @foreach ($favorites as $favorite)
                                @include('frontend.includes.product-preview-card', ['product' => $favorite])
                            @endforeach
                            {{-- @if ($favorites->hasPages())
                                @include('frontend.includes.product-add-card', ['hashFragment' => '#favorite-tab'])
                            @endif --}}
                        </ul>
                        <div class="block-pagination d-none d-lg-block">
                            {{ $favorites->onEachSide(2)->links('vendor.pagination.motoshop-pagination') }}
                        </div>
                        <div class="block-pagination d-block d-lg-none">
                            {{ $favorites->onEachSide(0)->links('vendor.pagination.motoshop-pagination') }}
                        </div>
                    @else
                        <p class="text-center">У Вас немає жодного обраного товару</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            if(window.location.hash == '#personal-info-tab' || window.location.hash == '#orders-tab' || window.location.hash == '#favorite-tab') {
                let hash = window.location.hash.replace('-tab', '');
                $('#myTab-top a[href="'+hash+'"]').tab('show');
            } else {
                $('#myTab-top a[href="#personal-info"]').tab('show');
                window.location.hash = 'personal-info-tab';
            }
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (event) {
            window.location.hash = event.target.id;
        });
    </script>
@endsection
