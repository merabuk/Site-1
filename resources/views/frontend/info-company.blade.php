@extends('layouts.app')

@section('title')
{{ $page->title }}
@endsection

@section('content')
@include('frontend.includes.breadcrumb', ['crumb' => $page->title])
<section class="section-info">
    <div class="container">
        <h2 class="title-section-2 title-section">{{ $page->title }}</h2>
        <div class="block-top-info align-items-center">
            <div class="img-block logo-dinamo">
                <img src="{{ asset('/images/company-logo.svg') }}" alt="photo-product" class="img">
            </div>
            <div class="text-left">
                <p class="text-break"><span class="strong-text">{{ $articles[0]->content }} </span>{{ $articles[1]->content }}</p>
                <p class="text-break">{{ $articles[2]->content }}</p>
                <p class="text-break">{{ $articles[3]->content }}</p>
            </div>
        </div>
    </div>
</section>
<section class="section-info">
    <div class="container">
        <h3 class="title">НАШІ ПЕРЕВАГИ</h3>
        <ul class="list-decor-arrow">
            <li>
                <div class="text-break">
                    <span class="strong-text">{{ $articles[4]->content }} </span>
                    {{ $articles[5]->content }}
                </div>
            </li>
            <li>
                <div class="text-break">
                    <span class="strong-text">{{ $articles[6]->content }} </span>
                    {{ $articles[7]->content }}
                </div>
            </li>
            <li>
                <div class="text-break">
                    {{ $articles[8]->content }}
                    <span class="strong-text">{{ $articles[9]->content }}</span>
                    {{ $articles[10]->content }}
                </div>
            </li>
            <li>
                <div class="text-break">
                    <span class="strong-text">{{ $articles[11]->content }}</span>
                </div>
            </li>
            <li>
                <div class="text-break">
                    {{ $articles[12]->content }}
                    <span class="strong-text">{{ $articles[13]->content }}</span>
                </div>
            </li>
        </ul>
    </div>
</section>
@endsection
