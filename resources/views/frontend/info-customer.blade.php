@extends('layouts.app')

@section('title')
{{ $page->title }}
@endsection

@section('content')
@include('frontend.includes.breadcrumb', ['crumb' => $page->title])
<div class="main customer">
    <div class="section-info customer">
        <div class="container">
            <h2 class="title-section-2 title-section">{{ $page->title }}</h2>
            <div class="block-top-info align-items-center">
                <div class="img-block p-0">
                    <img src="{{ asset('./images/img-customer.svg') }}" alt="photo-product" class="img">
                </div>
                <div>
                    <h3 class="title text-center text-md-left ">Графік роботи</h3>
                    <div class="d-md-flex text-center text-md-left">
                        <ul class="list-timetable">
                            <li><span class="strong-text">{{ $articles[0]->content }}</span></li>
                            <li>{{ $articles[1]->content }}</li>
                            <li>{{ $articles[2]->content }}</li>
                            <li>{{ $articles[3]->content }}</li>
                            <li>{{ $articles[4]->content }}</li>
                            <li>{{ $articles[5]->content }}</li>
                            <li>{{ $articles[6]->content }}</li>
                        </ul>
                        <ul class="list-timetable">
                            <li><span class="strong-text">{{ $articles[7]->content }}</span></li>
                            <li>{{ $articles[8]->content }}</li>
                            <li>{{ $articles[9]->content }}</li>
                            <li>{{ $articles[10]->content }}</li>
                            <li>{{ $articles[11]->content }}</li>
                            <li>{{ $articles[12]->content }}</li>
                            <li>{{ $articles[13]->content }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="title">ГАРАНТІЯ</h3>
            <p class="text-break">
                {{ $articles[14]->content }}
            </p>
            <p class="text-break">
                {{ $articles[15]->content }}
            </p>
            <h3 class="title">{{ $articles[16]->content }}</h3>
        </div>
    </div>
    <div class="section-info customer">
        <div class="container">
            <ul class="list-decor-arrow">
                <li>
                    {{ $articles[17]->content }}
                </li>
                <li>
                    {{ $articles[18]->content }}
                </li>
                <li>
                    {{ $articles[19]->content }}
                </li>
            </ul>
            <p class="text-break">{{ $articles[20]->content }}</p>
            <h3 class="title">{{ $articles[21]->content }}</h3>
            <ul class="list-decor-arrow">
                <li>
                    {{ $articles[22]->content }}
                </li>
                <li>
                    {{ $articles[23]->content }}
                </li>
                <li>
                    {{ $articles[24]->content }}
                </li>
            </ul>
            <h3 class="title">ВАМ НЕОБХІДНО: </h3>
            <ol>
                <li>{{ $articles[25]->content }}</li>
                <li>{{ $articles[26]->content }}</li>
                <li>{{ $articles[27]->content }}</li>
                <li>{{ $articles[28]->content }}</li>
            </ol>
        </div>
    </div>
</div>
@endsection
