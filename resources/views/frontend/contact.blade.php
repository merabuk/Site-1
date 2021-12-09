@extends('layouts.app')

@section('title')
{{ $page->title }}
@endsection

@section('content')
@include('frontend.includes.breadcrumb', ['crumb' => $page->title])
<section class="section-contact">
    <div class="container">
        <h2 class="title-section-2 title-section">{{ $page->title }}</h2>
        <div class="block-contact">
            <div class="img-block">
                <img src="{{ asset('/images/img-page-contact.svg') }}" alt="photo-product" class="img">
            </div>
            <ul class="list-location">
                <li><span class="icon icon-house"></span><span>{{ $articles[0]->content }}</span></li>
                <li><span class="icon icon-maps"></span>
                    <ul>
                        <li>{{ $articles[1]->content }}</li>
                        <li>{{ $articles[2]->content }}</li>
                    </ul>
                </li>
                <li><span class="icon icon-phone"></span>
                    <ul>
                        <li>
                            <a class="link-tdn" href="tel:{{ $articles[3]->content }}">{{ $articles[3]->content }}</a>
                        </li>
                        <li>
                            <a class="link-tdn" href="tel:{{ $articles[4]->content }}">{{ $articles[4]->content }}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <span class="icon icon-mail"></span>
                    <span>
                        <a class="link-tdn" href="mailto:{{ $articles[5]->content }}">{{ $articles[5]->content }}</a>
                    </span>
                </li>
                <li>
                    <span class="icon icon-clock"></span>
                    <ul>
                        <li>{{ $articles[6]->content }}</li>
                        <li>{{ $articles[7]->content }}</li>
                        <li>{{ $articles[8]->content }}</li>
                        <li>{{ $articles[9]->content }}</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="section-maps">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2750.5936029529876!2d30.720466715589595!3d46.417112779123705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c633718d494737%3A0xff018c65b4508c54!2z0JvRjtGB0YLQtNC-0YDRhNGB0YzQutCwINC00L7RgNC-0LPQsCwgOTYsINCe0LTQtdGB0LAsINCe0LTQtdGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCA2NTAwMA!5e0!3m2!1suk!2sua!4v1608462010246!5m2!1suk!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>
@endsection
