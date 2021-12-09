@extends( Request::is('home*') ? 'adminlte::page' : 'layouts.app')

@section('title', 419)

@if (Request::is('home*'))
    @section('content_header')
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>419 Час сессії минув</h1>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="error-page">
            <h2 class="headline text-warning">419</h2>
            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i>Час сессії минув</h3>
                <p>Вибачте, Ваш сеанс закінчився. Будь ласка, оновіть і повторіть спробу. <a href="{{ route('home') }}">До інформаційної панелі</a></p>
            </div>
        </div>
    @endsection
@else
    @section('content')
        <div class="page-404">
            <div class="container">
                <div class="block-404">
                    <span class="info-error">419</span>
                    <span class="text-error">Запит відхилений.</span>
                    <p>Ви знаходитесь тут тому, що Ваш сеанс закінчився. Будь ласка, оновіть і повторіть спробу.</p>
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
