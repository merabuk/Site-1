@extends('adminlte::page')

@section('title', 'Редагувати сторінку')

@section('content_header')
<h1 class="m-0 text-dark">Редагувати сторінку</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#main" data-toggle="tab">Дані</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#content" data-toggle="tab">Зміст</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content p-0">

                            {{-- Содержимое основной вкладки --}}
                            <div class="tab-pane active" id="main">
                                <form action="{{ route('front-pages.update', $front_page->slug) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label for="title">Заголовок сторінки</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                        value="{{ old('title', $front_page->title) }}" placeholder="Введіть заголовок сторінки">
                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">Ключові слова сторінки</label>
                                        <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords"
                                        value="{{ old('keywords', $front_page->keywords) }}" placeholder="Введіть ключові слова">
                                        @error('keywords')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Опис сторінки</label>
                                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="3" placeholder="Введіть опис">{{ old('description', $front_page->description) }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Редагувати</button>
                                    <a href="{{ route('front-pages.index') }}" class="btn btn-default">Відміна</a>
                                </form>
                            </div>

                            {{-- Содержимое вкладки Контент --}}
                            <div class="tab-pane" id="content">
                                <h3>{{ $front_page->title }}</h3>
                                <form class="col-12" action="{{ route('articlesUpdate', $front_page->slug) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    @if($front_page->slug === 'info-question')

                                    <div class="form-group">
                                        <label for="content-0">Жирний текст</label>
                                        <textarea id="content-0" name="content-0" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[0]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-1">Звичайний текст</label>
                                        <textarea id="content-1" name="content-1" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[1]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-2">Звичайний текст</label>
                                        <textarea id="content-2" name="content-2" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[2]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-3">Звичайний текст</label>
                                        <textarea id="content-3" name="content-3" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[3]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-4">Звичайний текст</label>
                                        <textarea id="content-4" name="content-4" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[4]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-5">Звичайний текст</label>
                                        <textarea id="content-5" name="content-5" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[5]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-6">Звичайний текст</label>
                                        <textarea id="content-6" name="content-6" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[6]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-7">Жирний текст</label>
                                        <textarea id="content-7" name="content-7" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[7]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-8">Жирний текст</label>
                                        <textarea id="content-8" name="content-8" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[8]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-9">Звичайний текст</label>
                                        <textarea id="content-9" name="content-9" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[9]->content }}</textarea>
                                    </div>

                                    @elseif($front_page->slug === 'info-company')

                                    <div class="form-group">
                                        <label for="content-0">Жирний текст</label>
                                        <textarea id="content-0" name="content-0" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[0]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-1">Звичайний текст</label>
                                        <textarea id="content-1" name="content-1" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[1]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-2">Звичайний текст</label>
                                        <textarea id="content-2" name="content-2" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[2]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-3">Звичайний текст</label>
                                        <textarea id="content-3" name="content-3" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[3]->content }}</textarea>
                                    </div>
                                    <h3>НАШІ ПЕРЕВАГИ</h3>
                                    <div class="form-group">
                                        <label for="content-4">Жирний текст</label>
                                        <textarea id="content-4" name="content-4" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[4]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-5">Звичайний текст</label>
                                        <textarea id="content-5" name="content-5" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[5]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-6">Жирний текст</label>
                                        <textarea id="content-6" name="content-6" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[6]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-7">Звичайний текст</label>
                                        <textarea id="content-7" name="content-7" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[7]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-8">Звичайний текст</label>
                                        <textarea id="content-8" name="content-8" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[8]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-9">Жирний текст</label>
                                        <textarea id="content-9" name="content-9" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[9]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-10">Звичайний текст</label>
                                        <textarea id="content-10" name="content-10" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[10]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-11">Жирний текст</label>
                                        <textarea id="content-11" name="content-11" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[11]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-12">Звичайний текст</label>
                                        <textarea id="content-12" name="content-12" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[12]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-13">Жирний текст</label>
                                        <textarea id="content-13" name="content-13" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[13]->content }}</textarea>
                                    </div>

                                    @elseif($front_page->slug === 'page-pay-shipping')

                                    <div class="form-group">
                                        <label for="content-0">Звичайний текст</label>
                                        <textarea id="content-0" name="content-0" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[0]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-1">Жирний текст</label>
                                        <textarea id="content-1" name="content-1" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[1]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-2">Звичайний текст</label>
                                        <textarea id="content-2" name="content-2" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[2]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-3">Звичайний текст</label>
                                        <textarea id="content-3" name="content-3" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[3]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-4">Звичайний текст</label>
                                        <textarea id="content-4" name="content-4" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[4]->content }}</textarea>
                                    </div>
                                    <h3>Самовивіз зі складу в Одесі</h3>
                                    <div class="form-group">
                                        <label for="content-5">Звичайний текст</label>
                                        <textarea id="content-5" name="content-5" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[5]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-6">Звичайний текст</label>
                                        <textarea id="content-6" name="content-6" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[6]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-7">Звичайний текст</label>
                                        <textarea id="content-7" name="content-7" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[7]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-8">Звичайний текст</label>
                                        <textarea id="content-8" name="content-8" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[8]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-9">Звичайний текст</label>
                                        <textarea id="content-9" name="content-9" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[9]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-10">Звичайний текст</label>
                                        <textarea id="content-10" name="content-10" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[10]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-11">Звичайний текст</label>
                                        <textarea id="content-11" name="content-11" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[11]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-12">Звичайний текст</label>
                                        <textarea id="content-12" name="content-12" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[12]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-13">Звичайний текст</label>
                                        <textarea id="content-13" name="content-13" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[13]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-14">Звичайний текст</label>
                                        <textarea id="content-14" name="content-14" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[14]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-15">Звичайний текст</label>
                                        <textarea id="content-15" name="content-15" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[15]->content }}</textarea>
                                    </div>

                                    @elseif($front_page->slug === 'contact')

                                    <div class="form-group">
                                        <label for="content-0">Звичайний текст</label>
                                        <textarea id="content-0" name="content-0" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[0]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-1">Звичайний текст</label>
                                        <textarea id="content-1" name="content-1" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[1]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-2">Звичайний текст</label>
                                        <textarea id="content-2" name="content-2" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[2]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-3">Звичайний текст</label>
                                        <textarea id="content-3" name="content-3" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[3]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-4">Звичайний текст</label>
                                        <textarea id="content-4" name="content-4" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[4]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-5">Звичайний текст</label>
                                        <textarea id="content-5" name="content-5" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[5]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-6">Звичайний текст</label>
                                        <textarea id="content-6" name="content-6" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[6]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-7">Звичайний текст</label>
                                        <textarea id="content-7" name="content-7" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[7]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-8">Звичайний текст</label>
                                        <textarea id="content-8" name="content-8" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[8]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-9">Звичайний текст</label>
                                        <textarea id="content-9" name="content-9" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[9]->content }}</textarea>
                                    </div>

                                    @elseif($front_page->slug === 'info-customer')

                                    <h3>Графік роботи</h3>
                                    <div class="form-group">
                                        <label for="content-0">Жирний текст</label>
                                        <textarea id="content-0" name="content-0" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[0]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-1">Звичайний текст</label>
                                        <textarea id="content-1" name="content-1" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[1]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-2">Звичайний текст</label>
                                        <textarea id="content-2" name="content-2" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[2]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-3">Звичайний текст</label>
                                        <textarea id="content-3" name="content-3" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[3]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-4">Звичайний текст</label>
                                        <textarea id="content-4" name="content-4" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[4]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-5">Звичайний текст</label>
                                        <textarea id="content-5" name="content-5" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[5]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-6">Звичайний текст</label>
                                        <textarea id="content-6" name="content-6" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[6]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-7">Жирний текст</label>
                                        <textarea id="content-7" name="content-7" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[7]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-8">Звичайний текст</label>
                                        <textarea id="content-8" name="content-8" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[8]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-9">Звичайний текст</label>
                                        <textarea id="content-9" name="content-9" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[9]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-10">Звичайний текст</label>
                                        <textarea id="content-10" name="content-10" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[10]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-11">Звичайний текст</label>
                                        <textarea id="content-11" name="content-11" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[11]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-12">Звичайний текст</label>
                                        <textarea id="content-12" name="content-12" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[12]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-13">Звичайний текст</label>
                                        <textarea id="content-13" name="content-13" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[13]->content }}</textarea>
                                    </div>
                                    <h3>ГАРАНТІЯ</h3>
                                    <div class="form-group">
                                        <label for="content-14">Звичайний текст</label>
                                        <textarea id="content-14" name="content-14" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[14]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-15">Звичайний текст</label>
                                        <textarea id="content-15" name="content-15" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[15]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-16">Жирний текст</label>
                                        <textarea id="content-16" name="content-16" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[16]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-17">Звичайний текст</label>
                                        <textarea id="content-17" name="content-17" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[17]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-18">Звичайний текст</label>
                                        <textarea id="content-18" name="content-18" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[18]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-19">Звичайний текст</label>
                                        <textarea id="content-19" name="content-19" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[19]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-20">Звичайний текст</label>
                                        <textarea id="content-20" name="content-20" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[20]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-21">Жирний текст</label>
                                        <textarea id="content-21" name="content-21" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[21]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-22">Звичайний текст</label>
                                        <textarea id="content-22" name="content-22" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[22]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-23">Звичайний текст</label>
                                        <textarea id="content-23" name="content-23" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[23]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-24">Звичайний текст</label>
                                        <textarea id="content-24" name="content-24" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[24]->content }}</textarea>
                                    </div>
                                    <h3>ВАМ НЕОБХІДНО:</h3>
                                    <div class="form-group">
                                        <label for="content-25">Звичайний текст</label>
                                        <textarea id="content-25" name="content-25" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[25]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-26">Звичайний текст</label>
                                        <textarea id="content-26" name="content-26" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[26]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-27">Звичайний текст</label>
                                        <textarea id="content-27" name="content-27" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[27]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-28">Звичайний текст</label>
                                        <textarea id="content-28" name="content-28" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[28]->content }}</textarea>
                                    </div>

                                    @elseif($front_page->slug === 'info-partners')

                                    <div class="form-group">
                                        <label for="content-0">Жирний текст</label>
                                        <textarea id="content-0" name="content-0" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[0]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-1">Звичайний текст</label>
                                        <textarea id="content-1" name="content-1" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[1]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-2">Звичайний текст</label>
                                        <textarea id="content-2" name="content-2" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[2]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-3">Жирний текст</label>
                                        <textarea id="content-3" name="content-3" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[3]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-4">Звичайний текст</label>
                                        <textarea id="content-4" name="content-4" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[4]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-5">Жирний текст</label>
                                        <textarea id="content-5" name="content-5" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[5]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-6">Звичайний текст</label>
                                        <textarea id="content-6" name="content-6" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[6]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-7">Жирний текст</label>
                                        <textarea id="content-7" name="content-7" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[7]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-8">Звичайний текст</label>
                                        <textarea id="content-8" name="content-8" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[8]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-9">Жирний текст</label>
                                        <textarea id="content-9" name="content-9" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[9]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-10">Звичайний текст</label>
                                        <textarea id="content-10" name="content-10" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[10]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-11">Жирний текст</label>
                                        <textarea id="content-11" name="content-11" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[11]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-12">Звичайний текст</label>
                                        <textarea id="content-12" name="content-12" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[12]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-13">Жирний текст</label>
                                        <textarea id="content-13" name="content-13" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[13]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-14">Звичайний текст</label>
                                        <textarea id="content-14" name="content-14" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[14]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-15">Жирний текст</label>
                                        <textarea id="content-15" name="content-15" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[15]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-16">Звичайний текст</label>
                                        <textarea id="content-16" name="content-16" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[16]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-17">Жирний текст</label>
                                        <textarea id="content-17" name="content-17" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[17]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-18">Звичайний текст</label>
                                        <textarea id="content-18" name="content-18" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[18]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-19">Жирний текст</label>
                                        <textarea id="content-19" name="content-19" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[19]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-20">Звичайний текст</label>
                                        <textarea id="content-20" name="content-20" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[20]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-21">Жирний текст</label>
                                        <textarea id="content-21" name="content-21" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[21]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-22">Звичайний текст</label>
                                        <textarea id="content-22" name="content-22" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[22]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-23">Жирний текст</label>
                                        <textarea id="content-23" name="content-23" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[23]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-24">Звичайний текст</label>
                                        <textarea id="content-24" name="content-24" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[24]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-25">Жирний текст</label>
                                        <textarea id="content-25" name="content-25" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[25]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-26">Звичайний текст</label>
                                        <textarea id="content-26" name="content-26" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[26]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-27">Жирний текст</label>
                                        <textarea id="content-27" name="content-27" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[27]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-28">Звичайний текст</label>
                                        <textarea id="content-28" name="content-28" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[28]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-29">Жирний текст</label>
                                        <textarea id="content-29" name="content-29" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[29]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-30">Звичайний текст</label>
                                        <textarea id="content-30" name="content-30" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[30]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-31">Жирний текст</label>
                                        <textarea id="content-31" name="content-31" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[31]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-32">Звичайний текст</label>
                                        <textarea id="content-32" name="content-32" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[32]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-33">Жирний текст</label>
                                        <textarea id="content-33" name="content-33" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[33]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-34">Звичайний текст</label>
                                        <textarea id="content-34" name="content-34" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[34]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-35">Жирний текст</label>
                                        <textarea id="content-35" name="content-35" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[35]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-36">Звичайний текст</label>
                                        <textarea id="content-36" name="content-36" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[36]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-37">Жирний текст</label>
                                        <textarea id="content-37" name="content-37" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[37]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-38">Звичайний текст</label>
                                        <textarea id="content-38" name="content-38" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[38]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-39">Жирний текст</label>
                                        <textarea id="content-39" name="content-39" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[39]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-40">Звичайний текст</label>
                                        <textarea id="content-40" name="content-40" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[40]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-41">Жирний текст</label>
                                        <textarea id="content-41" name="content-41" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[41]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-42">Звичайний текст</label>
                                        <textarea id="content-42" name="content-42" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[42]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-43">Жирний текст</label>
                                        <textarea id="content-43" name="content-43" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[43]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-44">Звичайний текст</label>
                                        <textarea id="content-44" name="content-44" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[44]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-45">Жирний текст</label>
                                        <textarea id="content-45" name="content-45" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[45]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-46">Звичайний текст</label>
                                        <textarea id="content-46" name="content-46" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[46]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-47">Жирний текст</label>
                                        <textarea id="content-47" name="content-47" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[47]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-48">Звичайний текст</label>
                                        <textarea id="content-48" name="content-48" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[48]->content }}</textarea>
                                    </div>

                                    @elseif($front_page->slug === 'footer')
                                    
                                    <h4>Контакти</h4>
                                    <h4>Магазин мотоекіпіровки в Одесі</h4>
                                    <div class="form-group">
                                        <label for="content-0">Звичайний текст</label>
                                        <textarea id="content-0" name="content-0" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[0]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-1">Звичайний текст</label>
                                        <textarea id="content-1" name="content-1" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[1]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-2">Звичайний текст</label>
                                        <textarea id="content-2" name="content-2" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[2]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-3">Звичайний текст</label>
                                        <textarea id="content-3" name="content-3" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[3]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-4">Звичайний текст</label>
                                        <textarea id="content-4" name="content-4" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[4]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-5">Звичайний текст</label>
                                        <textarea id="content-5" name="content-5" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[5]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-6">Звичайний текст</label>
                                        <textarea id="content-6" name="content-6" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[6]->content }}</textarea>
                                    </div>
                                    <h3>Київ</h3>
                                    <div class="form-group">
                                        <label for="content-7">Звичайний текст</label>
                                        <textarea id="content-7" name="content-7" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[7]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-8">Звичайний текст</label>
                                        <textarea id="content-8" name="content-8" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[8]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-9">Звичайний текст</label>
                                        <textarea id="content-9" name="content-9" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[9]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-10">Звичайний текст</label>
                                        <textarea id="content-10" name="content-10" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[10]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-11">Звичайний текст</label>
                                        <textarea id="content-11" name="content-11" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[11]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-12">Звичайний текст</label>
                                        <textarea id="content-12" name="content-12" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[12]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-13">Звичайний текст</label>
                                        <textarea id="content-13" name="content-13" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[13]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-14">Звичайний текст</label>
                                        <textarea id="content-14" name="content-14" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[14]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-15">Звичайний текст</label>
                                        <textarea id="content-15" name="content-15" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[15]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-16">Звичайний текст</label>
                                        <textarea id="content-16" name="content-16" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[16]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-17">Звичайний текст</label>
                                        <textarea id="content-17" name="content-17" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[17]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-18">Звичайний текст</label>
                                        <textarea id="content-18" name="content-18" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[18]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-19">Звичайний текст</label>
                                        <textarea id="content-19" name="content-19" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[19]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-20">Звичайний текст</label>
                                        <textarea id="content-20" name="content-20" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[20]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-21">Звичайний текст</label>
                                        <textarea id="content-21" name="content-21" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[21]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-22">Звичайний текст</label>
                                        <textarea id="content-22" name="content-22" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[22]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-23">Звичайний текст</label>
                                        <textarea id="content-23" name="content-23" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[23]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-24">Звичайний текст</label>
                                        <textarea id="content-24" name="content-24" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[24]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-25">Звичайний текст</label>
                                        <textarea id="content-25" name="content-25" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[25]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-26">Звичайний текст</label>
                                        <textarea id="content-26" name="content-26" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[26]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-27">Звичайний текст</label>
                                        <textarea id="content-27" name="content-27" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[27]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-28">Звичайний текст</label>
                                        <textarea id="content-28" name="content-28" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[28]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-29">Звичайний текст</label>
                                        <textarea id="content-29" name="content-29" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[29]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-30">Звичайний текст</label>
                                        <textarea id="content-30" name="content-30" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[30]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-31">Звичайний текст</label>
                                        <textarea id="content-31" name="content-31" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[31]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-32">Звичайний текст</label>
                                        <textarea id="content-32" name="content-32" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[32]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-33">Звичайний текст</label>
                                        <textarea id="content-33" name="content-33" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[33]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-34">Звичайний текст</label>
                                        <textarea id="content-34" name="content-34" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[34]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-35">Звичайний текст</label>
                                        <textarea id="content-35" name="content-35" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[35]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-36">Звичайний текст</label>
                                        <textarea id="content-36" name="content-36" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[36]->content }}</textarea>
                                    </div>
                                    <h3>Івано-Франківськ</h3>
                                    <div class="form-group">
                                        <label for="content-37">Звичайний текст</label>
                                        <textarea id="content-37" name="content-37" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[37]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-38">Звичайний текст</label>
                                        <textarea id="content-38" name="content-38" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[38]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-39">Звичайний текст</label>
                                        <textarea id="content-39" name="content-39" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[39]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-40">Звичайний текст</label>
                                        <textarea id="content-40" name="content-40" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[40]->content }}</textarea>
                                    </div>
                                    <h3>Запоріжжя</h3>
                                    <div class="form-group">
                                        <label for="content-41">Звичайний текст</label>
                                        <textarea id="content-41" name="content-41" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[41]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-42">Звичайний текст</label>
                                        <textarea id="content-42" name="content-42" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[42]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-43">Звичайний текст</label>
                                        <textarea id="content-43" name="content-43" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[43]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-44">Звичайний текст</label>
                                        <textarea id="content-44" name="content-44" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[44]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-45">Звичайний текст</label>
                                        <textarea id="content-45" name="content-45" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[45]->content }}</textarea>
                                    </div>
                                    <h3>Миколаїв</h3>
                                    <div class="form-group">
                                        <label for="content-46">Звичайний текст</label>
                                        <textarea id="content-46" name="content-46" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[46]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-47">Звичайний текст</label>
                                        <textarea id="content-47" name="content-47" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[47]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-48">Звичайний текст</label>
                                        <textarea id="content-48" name="content-48" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[48]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-49">Звичайний текст</label>
                                        <textarea id="content-49" name="content-49" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[49]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-50">Звичайний текст</label>
                                        <textarea id="content-50" name="content-50" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[50]->content }}</textarea>
                                    </div>
                                    <h3>Кропивницький</h3>
                                    <div class="form-group">
                                        <label for="content-51">Звичайний текст</label>
                                        <textarea id="content-51" name="content-51" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[51]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-52">Звичайний текст</label>
                                        <textarea id="content-52" name="content-52" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[52]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-53">Звичайний текст</label>
                                        <textarea id="content-53" name="content-53" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[53]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-54">Звичайний текст</label>
                                        <textarea id="content-54" name="content-54" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[54]->content }}</textarea>
                                    </div>
                                    <h3>Львів</h3>
                                    <div class="form-group">
                                        <label for="content-55">Звичайний текст</label>
                                        <textarea id="content-55" name="content-55" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[55]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-56">Звичайний текст</label>
                                        <textarea id="content-56" name="content-56" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[56]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-57">Звичайний текст</label>
                                        <textarea id="content-57" name="content-57" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[57]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-58">Звичайний текст</label>
                                        <textarea id="content-58" name="content-58" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[58]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-59">Звичайний текст</label>
                                        <textarea id="content-59" name="content-59" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[59]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-60">Звичайний текст</label>
                                        <textarea id="content-60" name="content-60" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[60]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-61">Звичайний текст</label>
                                        <textarea id="content-61" name="content-61" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[61]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-62">Звичайний текст</label>
                                        <textarea id="content-62" name="content-62" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[62]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-63">Звичайний текст</label>
                                        <textarea id="content-63" name="content-63" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[63]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-64">Звичайний текст</label>
                                        <textarea id="content-64" name="content-64" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[64]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-65">Звичайний текст</label>
                                        <textarea id="content-65" name="content-65" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[65]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-66">Звичайний текст</label>
                                        <textarea id="content-66" name="content-66" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[66]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-67">Звичайний текст</label>
                                        <textarea id="content-67" name="content-67" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[67]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-68">Звичайний текст</label>
                                        <textarea id="content-68" name="content-68" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[68]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-69">Звичайний текст</label>
                                        <textarea id="content-69" name="content-69" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[69]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-70">Звичайний текст</label>
                                        <textarea id="content-70" name="content-70" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[70]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-71">Звичайний текст</label>
                                        <textarea id="content-71" name="content-71" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[71]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-72">Звичайний текст</label>
                                        <textarea id="content-72" name="content-72" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[72]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-73">Звичайний текст</label>
                                        <textarea id="content-73" name="content-73" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[73]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-74">Звичайний текст</label>
                                        <textarea id="content-74" name="content-74" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[74]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-75">Звичайний текст</label>
                                        <textarea id="content-75" name="content-75" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[75]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-76">Звичайний текст</label>
                                        <textarea id="content-76" name="content-76" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[76]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-77">Звичайний текст</label>
                                        <textarea id="content-77" name="content-77" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[77]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-78">Звичайний текст</label>
                                        <textarea id="content-78" name="content-78" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[78]->content }}</textarea>
                                    </div>
                                    <h3>Дніпропетровськ</h3>
                                    <div class="form-group">
                                        <label for="content-79">Звичайний текст</label>
                                        <textarea id="content-79" name="content-79" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[79]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-80">Звичайний текст</label>
                                        <textarea id="content-80" name="content-80" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[80]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-81">Звичайний текст</label>
                                        <textarea id="content-81" name="content-81" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[81]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-82">Звичайний текст</label>
                                        <textarea id="content-82" name="content-82" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[82]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-83">Звичайний текст</label>
                                        <textarea id="content-83" name="content-83" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[83]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-84">Звичайний текст</label>
                                        <textarea id="content-84" name="content-84" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[84]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-85">Звичайний текст</label>
                                        <textarea id="content-85" name="content-85" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[85]->content }}</textarea>
                                    </div>
                                    <h3>Харків</h3>
                                    <div class="form-group">
                                        <label for="content-86">Звичайний текст</label>
                                        <textarea id="content-86" name="content-86" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[86]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-87">Звичайний текст</label>
                                        <textarea id="content-87" name="content-87" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[87]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-88">Звичайний текст</label>
                                        <textarea id="content-88" name="content-88" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[88]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-89">Звичайний текст</label>
                                        <textarea id="content-89" name="content-89" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[89]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-90">Звичайний текст</label>
                                        <textarea id="content-90" name="content-90" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[90]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-91">Звичайний текст</label>
                                        <textarea id="content-91" name="content-91" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[91]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-92">Звичайний текст</label>
                                        <textarea id="content-92" name="content-92" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[92]->content }}</textarea>
                                    </div>
                                    <h3>Одеса</h3>
                                    <div class="form-group">
                                        <label for="content-93">Звичайний текст</label>
                                        <textarea id="content-93" name="content-93" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[93]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-94">Звичайний текст</label>
                                        <textarea id="content-94" name="content-94" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[94]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-95">Звичайний текст</label>
                                        <textarea id="content-95" name="content-95" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[95]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-96">Звичайний текст</label>
                                        <textarea id="content-96" name="content-96" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[96]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-97">Звичайний текст</label>
                                        <textarea id="content-97" name="content-97" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[97]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-98">Звичайний текст</label>
                                        <textarea id="content-98" name="content-98" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[98]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-99">Звичайний текст</label>
                                        <textarea id="content-99" name="content-99" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[99]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-100">Звичайний текст</label>
                                        <textarea id="content-100" name="content-100" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[100]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-101">Звичайний текст</label>
                                        <textarea id="content-101" name="content-101" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[101]->content }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="content-102">Звичайний текст</label>
                                        <textarea id="content-102" name="content-102" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[102]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-103">Звичайний текст</label>
                                        <textarea id="content-103" name="content-103" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[103]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-104">Звичайний текст</label>
                                        <textarea id="content-104" name="content-104" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[104]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-105">Звичайний текст</label>
                                        <textarea id="content-105" name="content-105" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[105]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-106">Звичайний текст</label>
                                        <textarea id="content-106" name="content-106" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[106]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-107">Звичайний текст</label>
                                        <textarea id="content-107" name="content-107" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[107]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-108">Звичайний текст</label>
                                        <textarea id="content-108" name="content-108" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[108]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-109">Звичайний текст</label>
                                        <textarea id="content-109" name="content-109" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[109]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-110">Звичайний текст</label>
                                        <textarea id="content-110" name="content-110" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[110]->content }}</textarea>
                                    </div>
                                    <h3>Херсон</h3>
                                    <div class="form-group">
                                        <label for="content-111">Звичайний текст</label>
                                        <textarea id="content-111" name="content-111" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[111]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-112">Звичайний текст</label>
                                        <textarea id="content-112" name="content-112" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[112]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-113">Звичайний текст</label>
                                        <textarea id="content-113" name="content-113" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[113]->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content-114">Звичайний текст</label>
                                        <textarea id="content-114" name="content-114" class="form-control @error('content') is-invalid @enderror" rows="3">{{ $articles[114]->content }}</textarea>
                                    </div>

                                    @endif
                                    <button type="submit" class="btn btn-primary">Редагувати</button>
                                    <a href="{{ route('front-pages.index') }}" class="btn btn-default">Відміна</a>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">

</div>
@stop

@section('js')

@endsection
