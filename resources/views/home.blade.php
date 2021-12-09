@extends('adminlte::page')

@section('title', 'Панель керування')

@section('content_header')
<h1 class="m-0 text-dark">Панель керування</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Замовлення</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- Заказы --}}
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="small-box bg-success p-3">
                            <div class="inner">
                                <h3>{{ $ordersCount }}</h3>
                                <h5>Замовлення</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <a href="{{ route('orders.index', ['scope' => 'all']) }}" class="small-box-footer">Детальніше... <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    {{-- Заказы в один клик --}}
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="small-box bg-warning p-3">
                            <div class="inner">
                                <h3>{{ $clickCount }}</h3>
                                <h5>Замовлення у один клік</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-fw fa-mouse-pointer "></i>
                            </div>
                            <a href="{{ route('order-oneclicks.index') }}" class="small-box-footer">Детальніше... <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    {{-- Продажи --}}
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="small-box bg-danger p-3">
                            <div class="inner">
                                <h3>{{ $newOrdersCount }}</h3>
                                <h5>Нові замовлення</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-fw fa-cart-plus"></i>
                            </div>
                            <a href="{{ route('orders.index', ['scope' => 'new']) }}" class="small-box-footer">Детальніше... <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Користувачі</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- Менеджеры --}}
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="small-box bg-info p-3">
                            <div class="inner">
                                <h3>{{ $managersCount }}</h3>
                                <h5>Менеджери</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-fw fa-user-shield "></i>
                            </div>
                            <a href="{{ route('users.index', ['scope' => 'managers']) }}" class="small-box-footer">Детальніше... <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    {{-- Дилеры --}}
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="small-box bg-info p-3">
                            <div class="inner">
                                <h3>{{ $dealersCount }}</h3>
                                <h5>Ділери</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-fw fa-user-lock "></i>
                            </div>
                            <a href="{{ route('users.index', ['scope' => 'dealers']) }}" class="small-box-footer">Детальніше... <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    {{-- Продажи --}}
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="small-box bg-info p-3">
                            <div class="inner">
                                <h3>{{ $newOrdersCount }}</h3>
                                <h5>Покупці</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-fw fa-user-tag "></i>
                            </div>
                            <a href="{{ route('users.index', ['scope' => 'buyers']) }}" class="small-box-footer">Детальніше... <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
