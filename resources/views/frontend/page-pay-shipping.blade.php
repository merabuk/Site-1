@extends('layouts.app')

@section('title')
{{ $page->title }}
@endsection

@section('content')
@include('frontend.includes.breadcrumb', ['crumb' => $page->title])
<section class="section-shipping section-info">
    <div class="container">
        <h2 class="title-section-2 title-section">{{ $page->title }}</h2>
        <div class="block-top-shipping">
            <div class="img-block">
                <img src="{{ asset('./images/men-info.svg') }}" alt="photo-product" class="img">
            </div>
            <div>
                <p class="text-break">{{ $articles[0]->content }}</p>
                <div class="block-call-manager">
                    <span>{{ $articles[1]->content }}</span>
                    <ul>
                        <li>
                            <a class="link-tdn" href="tel:{{ $articles[2]->content }}">{{ $articles[2]->content }}</a>
                        </li>
                        <li class="pb-2">
                            <a class="link-tdn" href="tel:{{ $articles[3]->content }}">{{ $articles[3]->content }}</a>
                        </li>
                        <li>
                            <a class="link-tdn" href="mailto:{{ $articles[4]->content }}">{{ $articles[4]->content }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-shipping">
    <div class="container">
        <h3 class="title">Самовивіз зі складу в Одесі</h3>
        <p class="text-break">{{ $articles[5]->content }}</p>
        <ul class="list-location block-contact">
            <li class="ord-1"><span class="icon icon-house"></span><span>{{ $articles[6]->content }}</span></li>
            <li class="ord-4"><span class="icon icon-maps"></span>
                <ul>
                    <li>{{ $articles[7]->content }}</li>
                    <li>{{ $articles[8]->content }}</li>
                </ul>
            </li>
            <li class="ord-2"><span class="icon icon-phone"></span>
                <ul>
                    <li>
                        <a class="link-tdn" href="tel:{{ $articles[9]->content }}">{{ $articles[9]->content }}</a>
                    </li>
                    <li>
                        <a class="link-tdn" href="tel:{{ $articles[10]->content }}">{{ $articles[10]->content }}</a>
                    </li>
                </ul>
            </li>
            <li class="ord-5">
                <span class="icon icon-mail"></span>
                <span>
                    <a class="link-tdn" href="mailto:{{ $articles[11]->content }}">{{ $articles[11]->content }}</a>
                </span>
            </li>
            <li class="ord-3">
                <span class="icon icon-clock"></span>
                <ul>
                    <li>{{ $articles[12]->content }}</li>
                    <li>{{ $articles[13]->content }}</li>
                    <li>{{ $articles[14]->content }}</li>
                    <li>{{ $articles[15]->content }}</li>
                </ul>
            </li>
        </ul>
    </div>
</section>
@endsection
