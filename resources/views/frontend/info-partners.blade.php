@extends('layouts.app')

@section('title')
{{ $page->title }}
@endsection

@section('content')
@include('frontend.includes.breadcrumb', ['crumb' => $page->title])
<section class="section-info">
    <div class="container">
        <h2 class="title-section-2 title-section">{{ $page->title }}</h2>
        <div class="block-top-info">
            <div class="img-block">
                <img src="{{ asset('./images/img-info-partners.svg') }}" alt="photo-product" class="img">
            </div>
            <div>
                <span class="text-strong">{{ $articles[0]->content }}</span>
                <p class="pt-lg-4 text-break">{{ $articles[1]->content }}</p>
                <p class="pt-lg-4 text-break">{{ $articles[2]->content }}</p>
            </div>
        </div>
        <ul class="list-site">
            <li>
                <div>
                    <span class="title">{{ $articles[3]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[4]->content }}/" rel="nofollow">{{ $articles[4]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[5]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[6]->content }}/" rel="nofollow">{{ $articles[6]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[7]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[8]->content }}/" rel="nofollow">{{ $articles[8]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[9]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[10]->content }}/" rel="nofollow">{{ $articles[10]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[11]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[12]->content }}/" rel="nofollow">{{ $articles[12]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[13]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[14]->content }}/" rel="nofollow">{{ $articles[14]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[15]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[16]->content }}/" rel="nofollow">{{ $articles[16]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[17]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[18]->content }}/" rel="nofollow">{{ $articles[18]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[19]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[20]->content }}/" rel="nofollow">{{ $articles[20]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[21]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[22]->content }}/" rel="nofollow">{{ $articles[22]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[23]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[24]->content }}/" rel="nofollow">{{ $articles[24]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[25]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[26]->content }}/" rel="nofollow">{{ $articles[26]->content }}</a></span>
                </div>

            </li>
            <li class="not-icon">
                <div>
                    <span class="title">{{ $articles[27]->content }}</span>
                    <span>{{ $articles[28]->content }}</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[29]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[30]->content }}/" rel="nofollow">{{ $articles[30]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[31]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[32]->content }}/" rel="nofollow">{{ $articles[32]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[33]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[34]->content }}/" rel="nofollow">{{ $articles[34]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[35]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[36]->content }}/" rel="nofollow">{{ $articles[36]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[37]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[38]->content }}/" rel="nofollow">{{ $articles[38]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[39]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[40]->content }}/" rel="nofollow">{{ $articles[40]->content }}</a></span>
                </div>

            </li>
            <li class="not-icon">
                <div>
                    <span class="title">{{ $articles[41]->content }}</span>
                    <span>{{ $articles[42]->content }}</span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[43]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[44]->content }}/" rel="nofollow">{{ $articles[44]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[45]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[46]->content }}/" rel="nofollow">{{ $articles[46]->content }}</a></span>
                </div>

            </li>
            <li>
                <div>
                    <span class="title">{{ $articles[47]->content }}</span>
                    <span class="icon-site"><a href="//{{ $articles[48]->content }}/" rel="nofollow">{{ $articles[48]->content }}</a></span>
                </div>
            </li>
        </ul>
    </div>
</section>
@endsection
