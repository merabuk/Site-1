@extends('adminlte::page')

@section('title', 'Створити бренд')

@section('content_header')
    <h1 class="m-0 text-dark">Створити бренд</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#main" data-toggle="tab">
                                @if($errors->first('name') || $errors->first('slug') || $errors->first('keywords') || $errors->first('description') || $errors->first('title') || $errors->first('details') || $errors->first('brand_order'))
                                    @include('backend.includes.menu-red-point')
                                @endif
                                <span>Дані</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#photo" data-toggle="tab">
                                @if($errors->has('is_main.*') || $errors->has('images.*') || $errors->has('order.*'))
                                    @include('backend.includes.menu-red-point')
                                @endif
                                <span>Зображення</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#video" data-toggle="tab">
                                @if($errors->has('video-name.*') || $errors->has('video-src.*') || $errors->has('video-order.*'))
                                    @include('backend.includes.menu-red-point')
                                @endif
                                <span>Відео</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="tab-content p-0">
                                {{-- Содержимое основной вкладки --}}
                                <div class="tab-pane active" id="main">
                                    <name-slug title="бренду"
                                        old-name="{{ old('name') }}"
                                        error-name="{{ $errors->first('name') }}"
                                        error-slug="{{ $errors->first('slug') }}"></name-slug>
                                    <div class="form-group">
                                        <label for="keywords">SEO Ключові слова</label>
                                        <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords"
                                            value="{{ old('keywords') }}" placeholder="Введіть ключові слова">
                                        @error('keywords')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">SEO Опис</label>
                                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="3" placeholder="Введіть SEO опис">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Заголовок бренду</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                            value="{{ old('title') }}" placeholder="Введіть заголовок бренду">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Опис бренду</label>
                                        <textarea type="text" class="form-control @error('details') is-invalid @enderror" id="details" name="details"
                                            rows="3" placeholder="Введіть опис">{{ old('details') }}</textarea>
                                        @error('details')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_order">Порядковий номер бренду</label>
                                        <input type="number" class="form-control @error('brand_order') is-invalid @enderror" id="brand_order" name="brand_order"
                                            value="{{ old('brand_order') }}" placeholder="Введіть порядковий номер бренду">
                                        @error('brand_order')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" @if (old('is_active')) checked @endif>
                                        <label class="custom-control-label" for="is_active">Відображати бренд на сайті</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Конец содержимого основной вкладки --}}
                                {{-- Содержимое вкладки Картинки --}}
                                <div class="tab-pane" id="photo">
                                    <div class="form-group">
                                        <label>Логотип бренду</label>
                                        <images-upload :errors="{{ $errors }}"
                                            path-to-save="images/brands"
                                        ></images-upload>
                                        <label>Зображення для фотогалереї</label>
                                        <images-upload
                                            path-to-save="images/brands"
                                            :errors="{{ $errors }}"
                                            :multi-upload=@json(true)
                                        ></images-upload>
                                    </div>
                                </div>
                                {{-- Конец содержимого вкладки Картинки --}}
                                {{-- Содержимое вкладки Видео --}}
                                <div class="tab-pane" id="video">
                                    <div class="form-group">
                                        <label>Відеогалерея</label>
                                        <videos-upload :errors="{{ $errors }}"></videos-upload>
                                    </div>
                                </div>
                                {{-- Конец содержимого вкладки Видео --}}
                            </div>
                            <button type="submit" class="btn btn-primary">Створити</button>
                            <a href="{{ route('brands.index') }}" class="btn btn-default">Відміна</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('plugins.Summernote', true)

@section('js')
<script>
    $(document).ready(function() {
        $('#details').summernote(
            {
                lang: 'uk-UA',
            }
        );
    });
</script>
@endsection
