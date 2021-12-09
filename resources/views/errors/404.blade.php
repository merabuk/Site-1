@extends( Request::is('home*') ? 'adminlte::page' : 'layouts.app')

@section('title', 404)

@if (Request::is('home*'))
    @section('content_header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Сторінка помилки 404</h1>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="error-page">
            <h2 class="headline text-warning">404</h2>
            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i>Упс! Сторінку не знайдено.</h3>
                <p>Ми не змогли знайти сторінку, яку ви шукали. У той же час, ви можете <a href="{{ route('home') }}">повернутися до інформаційної панелі</a> або спробуйте скористатися формою пошуку.</p>
            </div>
        </div>
    @endsection
@else
    @section('content')
        <div class="page-404">
            <div class="container">
                <div class="block-404">
                    <span class="info-error">404</span>
                    <span class="text-error">Упс, сторінки не знайдено!</span>
                    <p>Ви знаходитесь тут тому, що запитувана сторінка не існує або була переміщена за іншою адресою.</p>
                    <div class="block-btn">
                        <a href="{{ route('main') }}" class="btn btn-to-home-page">На головну</a>
                        @guest
                            <a href="" class="btn btn-custom-project" data-toggle="modal" data-target="#loginModal">Зареєструватися / Увійти</a>
                        @endguest
                        @auth
                            <a href="{{ route('admin-personal', auth()->user()) }}" class="btn btn-custom-project">Особистий кабінет</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
