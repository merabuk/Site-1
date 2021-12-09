<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico')}}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <!-- Styles -->
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    @yield('css')
    {{-- Токен для доступа к API --}}
    @auth
        <script>
            window.laravel = @json(['api_token' => auth()->user()->api_token]);
        </script>
    @endauth
    @guest
        <script>
            window.laravel = '';
        </script>
    @endguest
    {{-- Google Analitycs --}}
    @include('frontend.includes.google.analitycs')
</head>
<body>
    <div id="app">
        @include('frontend.includes.header')
        @include('backend.includes.flash')
        @yield('content')
        <slider-brand :brands="{{ $brands }}"
            brand-route="{{ route('product-brands') }}"
            :brand-slug="brandSlug"></slider-brand>
        @include('frontend.includes.call-me')
        @include('frontend.includes.footer')
        <login-modal old-email="{{ session()->get('useremail') }}"
            :type-email="form.email"
            :type-password="form.password"
            :clear-data="clearDataLoginStatus"
            v-on:change-login="changeLogin"
            v-on:change-password="changePassword"
            v-on:logged="turnOn"
            v-on:get-name="getName"
            v-on:clear-data-success="setDataStatusFalse"
            v-on:get-url="getUrlbyRole"></login-modal>
        <register-modal :type-email="form.email"
            :type-password="form.password"
            :clear-data="clearDataRegisterStatus"
            v-on:change-login="changeLogin"
            v-on:change-password="changePassword"
            v-on:registered="turnOn"
            v-on:get-name="getName"
            v-on:clear-data-success="setDataStatusFalse"
            v-on:get-url="getUrlbyRole"></register-modal>
        <password-reset-send-email-modal :type-email="form.email"></password-reset-send-email-modal>
        @if (!empty($token) && !empty($email))
            <password-reset-modal request-email="{{ $email }}" request-token="{{ $token }}"></password-reset-modal>
        @endif
        <order-done-modal></order-done-modal>
        <modal-sing-up-thank :switch-disable="switchDisable"
            :route-user="url"></modal-sing-up-thank>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/frontend.js') }}"></script>
    <script src="{{ mix('js/menu.js') }}"></script>
    <script src="{{ mix('js/slider.js') }}"></script>
    <script src="{{ mix('js/modals.js') }}"></script>
    @yield('script')
    <script>
        $(document).ready(function(){
            lozad('img[data-srcset]').observe();
            $('input[type=tel]').mask('(999) 999-99-99');
            $('form.filter-catalog').on('change', function() {
                this.submit();
            });
        });
    </script>
</body>
</html>
