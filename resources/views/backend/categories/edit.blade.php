@extends('adminlte::page')

@section('title', 'Редагувати категорію')

@section('content_header')
<h1 class="m-0 text-dark">Редагувати категорію</h1>
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
                                @if($errors->first('name') || $errors->first('slug') || $errors->first('category_id') || $errors->first('keywords') || $errors->first('description') || $errors->first('details'))
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
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('categories.update', $category) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="tab-content p-0">
                                {{-- Содержимое основной вкладки --}}
                                <div class="tab-pane active" id="main">
                                    <name-slug title="категорії" old-name="{{ old('name', $category->name) }}"
                                        error-name="@error('name') {{ $message }} @enderror"
                                        error-slug="@error('slug') {{ $message }} @enderror"></name-slug>
                                    {{-- Код категории для импорта --}}
                                    <div class="form-group">
                                        <label for="import_code">Код для імпорту</label>
                                        <input type="number" min=1 class="form-control @error('import_code') is-invalid @enderror"
                                            id="import_code" name="import_code" value="{{ old('import_code', $category->import_code) }}"
                                            placeholder="Введіть код категорії для імпорту товарів">
                                        @error('import_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Батьківська категорія</label>
                                        <select id="category_id" class="form-control select2 @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                            <option @if (old('category_id', $category->category_id) == '') selected
                                                @endif value=''>Без категорії</option>
                                            @foreach ($parents as $parent)
                                            <option @if (old('category_id', $category->category_id) == $parent->id)
                                                selected @endif value="{{ $parent->id }}">{{ $parent->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">SEO Ключові слова</label>
                                        <input type="text" class="form-control @error('keywords') is-invalid @enderror"
                                            id="keywords" name="keywords"
                                            value="{{ old('keywords', $category->keywords) }}"
                                            placeholder="Введіть ключові слова">
                                        @error('keywords')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">SEO Опис</label>
                                        <textarea type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            id="description" name="description" rows="3"
                                            placeholder="Введіть опис">{{ old('description', $category->description) }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Опис категорії</label>
                                        <textarea type="text" class="form-control @error('details') is-invalid @enderror" id="details" name="details"
                                            rows="3" placeholder="Введіть опис">{{ old('details', $category->details) }}</textarea>
                                        @error('details')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="is_active"
                                                name="is_active" value="1" @if (old('is_active', $category->is_active))
                                            checked @endif>
                                            <label class="custom-control-label" for="is_active">Відображати категорію на
                                                сайті</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Содержимое вкладки Описание категории --}}
                                <div class="tab-pane" id="photo">
                                    <div class="form-group">
                                        <label>Зображення категорії</label>
                                        <images-upload :errors="{{ $errors }}"
                                            parent-model-class="{{ get_class($category) }}"
                                            :parent-model-id="{{ $category->id }}"
                                            :images="{{ $category->mainImage }}"
                                            path-to-save="images/categories"
                                        ></images-upload>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Опис категорії</label>
                                        <textarea type="text"
                                            class="form-control @error('details') is-invalid @enderror"
                                            id="details" name="details" rows="3"
                                            placeholder="Введіть опис">{{ old('details', $category->details) }}</textarea>
                                        @error('details')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Редагувати</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-default">Відміна</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('plugins.Select2', true)

@push('js')
    <script>
        $(document).ready(function() {
            $('#category_id').select2(
                {
                    theme: 'bootstrap4',
                }
            );
        });
    </script>
@endpush

