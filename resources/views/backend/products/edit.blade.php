@extends('adminlte::page')

@section('title', 'Редагувати товар')

@section('content_header')
<h1 class="m-0 text-dark">Редагувати товар</h1>
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
                                @if($errors->first('article') || $errors->first('name') || $errors->first('details') || $errors->first('brand_id') || $errors->first('category_id') || $errors->first('keywords') || $errors->first('description'))
                                    @include('backend.includes.menu-red-point')
                                @endif
                                <span>Товар</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#price" data-toggle="tab">
                                @if($errors->first('price') || $errors->first('dealer_price') || $errors->first('discount') || $errors->first('discount_from') || $errors->first('discount_until') || $errors->first('promotion_price') || $errors->first('promotion_from') || $errors->first('promotion_until'))
                                    @include('backend.includes.menu-red-point')
                                @endif
                                <span>Ціни</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#option" data-toggle="tab">
                                @if($errors->first('color') || $errors->first('color.*') || $errors->first('size') || $errors->first('size.*') || $errors->first('material') || $errors->first('material.*') || $errors->first('direction') || $errors->first('direction.*') || $errors->first('sex') || $errors->first('sex.*') || $errors->first('season') || $errors->first('season.*') || $errors->first('quantity') || $errors->first('length') || $errors->first('width') || $errors->first('height') || $errors->first('dim_unit') || $errors->first('weight') || $errors->first('weight_unit'))
                                    @include('backend.includes.menu-red-point')
                                @endif
                                <span>Характеристики</span>
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
                        <form action="{{ route('products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="tab-content p-0">
                                {{-- Содержимое основной вкладки --}}
                                <div class="tab-pane active" id="main">
                                    {{-- Артикль --}}
                                    <div class="form-group">
                                        <label for="article" class="red-star">Артикул товару</label>
                                        <input type="text" class="form-control @error('article') is-invalid @enderror"
                                            id="article" name="article" value="{{ old('article', $product->article) }}"
                                            placeholder="Введіть артикул товара">
                                        @error('article')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Нейм --}}
                                    <div class="form-group">
                                        <label for="name" class="red-star">Назва товару</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $product->name) }}"
                                            placeholder="Введіть назву">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Описание товара --}}
                                    <div class="form-group">
                                        <label for="details">Опис товара</label>
                                        <textarea type="text"
                                            class="form-control @error('details') is-invalid @enderror" id="details"
                                            name="details" rows="3"
                                            placeholder="Введіть опис">{{ old('details', $product->details) }}</textarea>
                                        @error('details')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Бренд товара --}}
                                    <div class="form-group">
                                        <label for="brand_id" class="red-star">Бренд товара</label>
                                        <select id="brand_id"
                                            class="form-control d-none @error('brand_id') is-invalid @enderror"
                                            name="brand_id">
                                            <option @if (old('brand_id', $product->brand_id)=='' ) selected @endif
                                                value=''>Без бренда
                                            </option>
                                            @foreach ($brands as $brand)
                                            <option @if (old('brand_id', $product->brand_id)==$brand->id) selected
                                                @endif
                                                value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Категория товара --}}
                                    <div class="form-group">
                                        <label for="category_id" class="red-star">Категорії товара</label>
                                        <select id="category_id"
                                            class="form-control select2-purple d-none @error('category_id') is-invalid @enderror"
                                            name="category_id[]" multiple="multiple">
                                            @foreach ($categories as $category)
                                            <option @if (in_array($category->id, old('category_id',
                                                $product->category_ids))) selected @endif
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- SEO Keywords --}}
                                    <div class="form-group">
                                        <label for="keywords">SEO Ключові слова</label>
                                        <input type="text" class="form-control @error('keywords') is-invalid @enderror"
                                            id="keywords" name="keywords"
                                            value="{{ old('keywords', $product->keywords) }}"
                                            placeholder="Введіть ключові слова">
                                        @error('keywords')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- SEO Description --}}
                                    <div class="form-group">
                                        <label for="description">SEO Опис</label>
                                        <textarea type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            id="description" name="description" rows="3"
                                            placeholder="Введіть опис">{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Активность товара --}}
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="is_active"
                                                name="is_active" value="1" @if (old('is_active', $product->is_active))
                                            checked @endif>
                                            <label class="custom-control-label" for="is_active">Відображати товар на
                                                сайті</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Содержимое вкладки Цены акции товара --}}
                                <div class="tab-pane" id="price">
                                    {{-- Цена товара --}}
                                    <div class="form-group">
                                        <label for="price" class="red-star">Ціна товару</label>
                                        <input type="number" min="0" step="0.01"
                                            class="form-control @error('price') is-invalid @enderror" id="price"
                                            name="price" value="{{ old('price', $product->price) }}"
                                            placeholder="Введіть ціну товара">
                                        @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Цена товара для диллера --}}
                                    <div class="form-group">
                                        <label for="dealer_price" class="red-star">Ціна товару для ділера</label>
                                        <input type="number" min="0" step="0.01"
                                            class="form-control @error('dealer_price') is-invalid @enderror"
                                            id="dealer_price" name="dealer_price"
                                            value="{{ old('dealer_price', $product->dealer_price) }}"
                                            placeholder="Введіть ціну товара для ділера">
                                        @error('dealer_price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- % скидки --}}
                                    <div class="form-group">
                                        <label for="discount">Відсоток знижки ціни товару</label>
                                        <input type="number" min="0" max="99" step="0.1"
                                            class="form-control @error('discount') is-invalid @enderror" id="discount"
                                            name="discount" value="{{ old('discount', $product->discount) }}"
                                            placeholder="Введіть відсоток знижки">
                                        @error('discount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Дата начала скидки --}}
                                    <div class="form-group">
                                        <label for="discount_from">Дата початку дії знижки на товар</label>
                                        <div class="input-group date" id="discount_from" data-target-input="nearest">
                                            <input type="text"
                                                class="form-control datetimepicker-input @error('discount_from') is-invalid @enderror"
                                                data-target="#discount_from" name="discount_from"
                                                value="{{ old('discount_from', $product->discount_from) }}"
                                                placeholder="Введіть дату початку дії знижки">
                                            <div class="input-group-append" data-target="#discount_from"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('discount_from')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Дата окончания скидки --}}
                                    <div class="form-group">
                                        <label for="discount_until">Дата завершення дії знижки на товар</label>
                                        <div class="input-group date" id="discount_until" data-target-input="nearest">
                                            <input type="text"
                                                class="form-control datetimepicker-input @error('discount_until') is-invalid @enderror"
                                                data-target="#discount_until" name="discount_until"
                                                value="{{ old('discount_until', $product->discount_until) }}"
                                                placeholder="Введіть дату завершення дії знижки">
                                            <div class="input-group-append" data-target="#discount_until"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('discount_until')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Акционная цена товара --}}
                                    <div class="form-group">
                                        <label for="promotion_price">Акційна ціна товара</label>
                                        <input type="number" min="0" step="0.01"
                                            class="form-control @error('promotion_price') is-invalid @enderror"
                                            id="promotion_price" name="promotion_price" value="{{ old('promotion_price', $product->promotion_price) }}"
                                            placeholder="Введіть акційну ціну товара">
                                        @error('promotion_price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Дата начала акции --}}
                                    <div class="form-group">
                                        <label for="promotion_from">Дата початку дії акції на товар</label>
                                        <div class="input-group date" id="promotion_from" data-target-input="nearest">
                                            <input type="text"
                                                class="form-control datetimepicker-input @error('promotion_from') is-invalid @enderror"
                                                data-target="#promotion_from" name="promotion_from"
                                                value="{{ old('promotion_from', $product->promotion_from) }}"
                                                placeholder="Введіть дату початку дії акції">
                                            <div class="input-group-append" data-target="#promotion_from"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('promotion_from')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Дата окончания акции --}}
                                    <div class="form-group">
                                        <label for="promotion_until">Дата завершення дії акції на товар</label>
                                        <div class="input-group date" id="promotion_until" data-target-input="nearest">
                                            <input type="text"
                                                class="form-control datetimepicker-input @error('promotion_until') is-invalid @enderror"
                                                data-target="#promotion_until" name="promotion_until"
                                                value="{{ old('promotion_until', $product->promotion_until) }}"
                                                placeholder="Введіть дату завершення дії акції">
                                            <div class="input-group-append" data-target="#promotion_until"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('promotion_until')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Новинка --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="is_new"
                                                name="is_new" value="1" @if (old('is_new', $product->is_new)) checked
                                            @endif>
                                            <label class="custom-control-label" for="is_new">Товар-новинка</label>
                                        </div>
                                    </div>
                                    {{-- Распродажа --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="on_sale"
                                                name="on_sale" value="1" @if (old('on_sale', $product->on_sale)) checked
                                            @endif>
                                            <label class="custom-control-label" for="on_sale">Розпродаж товару</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Содержимое вкладки Характеристики товара --}}
                                <div class="tab-pane" id="option">
                                    {{-- Цвет товара --}}
                                    <div class="form-group">
                                        <label for="color">Колір товара</label>
                                        <select id="color"
                                            class="form-control @error('color') is-invalid @enderror"
                                            name="color[]" multiple="multiple" placeholder="Оберіть кольори">
                                            @foreach (old('color', $product->color) as $color)
                                                <option selected>{{ $color }}</option>
                                            @endforeach
                                        </select>
                                        @error('color')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if ($errors->first('color.*'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('color.*') }}
                                            </div>
                                        @endif
                                    </div>
                                    {{-- Размер товара --}}
                                    <div class="form-group">
                                        <label for="size">Розмір товара</label>
                                        <select id="size"
                                            class="form-control @error('size') is-invalid @enderror"
                                            name="size[]" multiple="multiple" placeholder="Оберіть розміри">
                                            @foreach (old('size', $product->size) as $size)
                                                <option selected>{{ $size }}</option>
                                            @endforeach
                                        </select>
                                        @error('size')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if ($errors->first('size.*'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('size.*') }}
                                            </div>
                                        @endif
                                    </div>
                                    {{-- Материал товара --}}
                                    <div class="form-group">
                                        <label for="material">Матеріал товара</label>
                                        <select id="material"
                                            class="form-control @error('material') is-invalid @enderror"
                                            name="material[]" multiple="multiple" placeholder="Оберіть матеріал">
                                            @foreach (old('material', $product->material) as $material)
                                                <option selected>{{ $material }}</option>
                                            @endforeach
                                        </select>
                                        @error('material')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if ($errors->first('material.*'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('material.*') }}
                                            </div>
                                        @endif
                                    </div>
                                    {{-- Направление товара --}}
                                    <div class="form-group">
                                        <label for="direction">Напрямок товара</label>
                                        <select id="direction"
                                            class="form-control @error('direction') is-invalid @enderror"
                                            name="direction[]" multiple="multiple" placeholder="Оберіть напрямок">
                                            @foreach (old('direction', $product->direction) as $direction)
                                                <option selected>{{ $direction }}</option>
                                            @endforeach
                                        </select>
                                        @error('direction')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if ($errors->first('direction.*'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('direction.*') }}
                                            </div>
                                        @endif
                                    </div>
                                    {{-- Пол товара --}}
                                    <div class="form-group">
                                        <label for="sex">Товар для статі</label>
                                        <select id="sex"
                                            class="form-control @error('sex') is-invalid @enderror"
                                            name="sex[]" multiple="multiple" placeholder="Введіть статі">
                                            @foreach (old('sex', $product->sex) as $sex)
                                                <option selected>{{ $sex }}</option>
                                            @endforeach
                                        </select>
                                        @error('sex')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if ($errors->first('sex.*'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('sex.*') }}
                                            </div>
                                        @endif
                                    </div>
                                    {{-- Сезонность товара --}}
                                    <div class="form-group">
                                        <label for="season">Сезонність товару</label>
                                        <select id="season"
                                            class="form-control @error('season') is-invalid @enderror"
                                            name="season[]" multiple="multiple" placeholder="Введіть сезонніть">
                                            @foreach (old('season', $product->season) as $season)
                                                <option selected>{{ $season }}</option>
                                            @endforeach
                                        </select>
                                        @error('season')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @if ($errors->first('season.*'))
                                            <div class="invalid-feedback d-block">
                                                {{ $errors->first('season.*') }}
                                            </div>
                                        @endif
                                    </div>
                                    {{-- Количество товара --}}
                                    <div class="form-group">
                                        <label for="quantity" class="red-star">Кількість товару на складі</label>
                                        <input type="number" min="0" step="1"
                                            class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                            name="quantity" value="{{ old('quantity', $product->quantity) }}"
                                            placeholder="Введіть кількість товара">
                                        @error('quantity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Длинна --}}
                                    <div class="form-group">
                                        <label for="length">Довжина товару</label>
                                        <input type="number" min="0"
                                            class="form-control @error('length') is-invalid @enderror" id="length"
                                            name="length" value="{{ old('length', $product->length) }}"
                                            placeholder="Введіть довжину">
                                        @error('length')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Ширина --}}
                                    <div class="form-group">
                                        <label for="width">Ширина товару</label>
                                        <input type="number" min="0"
                                            class="form-control @error('width') is-invalid @enderror" id="width"
                                            name="width" value="{{ old('width', $product->width) }}"
                                            placeholder="Введіть ширину">
                                        @error('width')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Высота --}}
                                    <div class="form-group">
                                        <label for="height">Висота товару</label>
                                        <input type="number" min="0"
                                            class="form-control @error('height') is-invalid @enderror" id="height"
                                            name="height" value="{{ old('height', $product->height) }}"
                                            placeholder="Введіть висоту">
                                        @error('height')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Единицы измерения габаритов --}}
                                    <div class="form-group">
                                        <label for="dim_unit">Одиниці виміру габаритів товару</label>
                                        <select id="dim_unit"
                                            class="custom-select @error('dim_unit') is-invalid @enderror"
                                            name="dim_unit">
                                            <option @if (old('dim_unit', $product->dim_unit)=='' ) selected @endif
                                                value=''>Введіть одиниці виміру</option>
                                            @foreach ($dim_units as $dim_unit)
                                            <option @if (old('dim_unit', $product->dim_unit)==$dim_unit['unit'])
                                                selected @endif
                                                value="{{ $dim_unit['unit'] }}">{{ $dim_unit['unit'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('dim_unit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Масса --}}
                                    <div class="form-group">
                                        <label for="weight">Маса товару</label>
                                        <input type="number" min="0"
                                            class="form-control @error('weight') is-invalid @enderror" id="weight"
                                            name="weight" value="{{ old('weight', $product->weight) }}"
                                            placeholder="Введіть масу">
                                        @error('weight')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Единицы измерения массы --}}
                                    <div class="form-group">
                                        <label for="weight_unit">Одиниці виміру маси товару</label>
                                        <select id="weight_unit"
                                            class="custom-select @error('weight_unit') is-invalid @enderror"
                                            name="weight_unit">
                                            <option @if (old('weight_unit', $product->weight_unit)=='' ) selected @endif
                                                value=''>Введіть одиниці виміру</option>
                                            @foreach ($weight_units as $weight_unit)
                                            <option @if (old('weight_unit', $product->
                                                weight_unit)==$weight_unit['unit']) selected @endif
                                                value="{{ $weight_unit['unit'] }}">{{ $weight_unit['unit'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('weight_unit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Содержимое вкладки Картинки --}}
                                <div class="tab-pane" id="photo">
                                    <div class="form-group">
                                        <label>Головне зображення товару</label>
                                        <images-upload :errors="{{ $errors }}"
                                            path-to-save="images/products"
                                            parent-model-class="{{ get_class($product) }}"
                                            :parent-model-id="{{ $product->id }}"
                                            :images="{{ $product->mainImage }}"></images-upload>
                                    </div>
                                    <div class="form-group">
                                        <label>Додаткові зображення товару</label>
                                        <images-upload path-to-save="images/products"
                                            parent-model-class="{{ get_class($product) }}"
                                            :parent-model-id="{{ $product->id }}" :images="{{ $product->addedImages }}"
                                            :errors="{{ $errors }}" :multi-upload=@json(true)></images-upload>
                                    </div>
                                </div>
                                {{-- Содержимое вкладки Видео --}}
                                <div class="tab-pane" id="video">
                                    <div class="form-group">
                                        <label>Відеогалерея</label>
                                        <videos-upload :errors="{{ $errors }}"
                                            :videos="{{ $product->videos }}"></videos-upload>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Редагувати</button>
                            <a href="{{ route('products.index') }}" class="btn btn-default">Відміна</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('plugins.Select2', true)
@section('plugins.Datepicker', true)

@push('js')
<script>
    $(document).ready(function() {
            $('#brand_id').select2(
                {
                    theme: 'bootstrap4',
                    placeholder: "Оберіть бренд",
                    language: "uk"
                }
            );
            $('#dim_unit, #weight_unit').select2(
                {
                    theme: 'bootstrap4',
                    placeholder: "Оберіть одиниці виміру",
                    language: "uk"
                }
            );
            $('#category_id').select2(
                {
                    theme: 'bootstrap4',
                    language: "uk",
                    @if (old('category_id') == null)
                        placeholder: "Оберіть категорії товару",
                    @endif
                }
            );

            $('#discount_from, #discount_until').datetimepicker(
                {
                    locale: 'uk',
                    icons: {
                    time: "fa fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                    },
                    format: 'YYYY-MM-DD HH:mm:ss',

                }
            );

            $('#promotion_from, #promotion_until').datetimepicker(
                {
                    locale: 'uk',
                    icons: {
                    time: "fa fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                    },
                    format: 'YYYY-MM-DD HH:mm:ss',

                }
            );

            $("#discount_from").on("dp.change", function (e) {
                $('#discount_until').data("DateTimePicker").minDate(e.date);
            });
            $("#discount_until").on("dp.change", function (e) {
                $('#discount_from').data("DateTimePicker").maxDate(e.date);
            });

            $("#promotion_from").on("dp.change", function (e) {
                $('#promotion_until').data("DateTimePicker").minDate(e.date);
            });
            $("#promotion_until").on("dp.change", function (e) {
                $('#promotion_from').data("DateTimePicker").maxDate(e.date);
            });

            $("#color").select2(
                {
                    //theme: 'bootstrap4',
                    tags: true,
                    tokenSeparators: [','],
                    placeholder: {
                        id: '-1',
                        text: 'Введіть кольори',
                        selected:'selected',
                    },
                    language: "uk",
                }
            );

            $("#size").select2(
                {
                    //theme: 'bootstrap4',
                    tags: true,
                    tokenSeparators: [','],
                    placeholder: {
                        id: '-1',
                        text: 'Оберіть розміри',
                        selected:'selected',
                    },
                    language: "uk",
                }
            );

            $("#material").select2(
                {
                    //theme: 'bootstrap4',
                    tags: true,
                    tokenSeparators: [','],
                    placeholder: {
                        id: '-1',
                        text: 'Оберіть матеріал',
                        selected:'selected',
                    },
                    language: "uk",
                }
            );

            $("#direction").select2(
                {
                    //theme: 'bootstrap4',
                    tags: true,
                    tokenSeparators: [','],
                    placeholder: {
                        id: '-1',
                        text: 'Оберіть напрямки',
                        selected:'selected',
                    },
                    language: "uk",
                }
            );

            $("#sex").select2(
                {
                    //theme: 'bootstrap4',
                    tags: true,
                    tokenSeparators: [','],
                    placeholder: {
                        id: '-1',
                        text: 'Введіть статі',
                        selected:'selected',
                    },
                    language: "uk",
                }
            );

            $("#season").select2(
                {
                    //theme: 'bootstrap4',
                    tags: true,
                    tokenSeparators: [','],
                    placeholder: {
                        id: '-1',
                        text: 'Введіть сезони',
                        selected:'selected',
                    },
                    language: "uk",
                }
            );
        });
</script>
@endpush
