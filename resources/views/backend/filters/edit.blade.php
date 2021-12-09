@extends('adminlte::page')

@section('title', 'Редагувати фільтр')

@section('content_header')
    <h1 class="m-0 text-dark">Редагувати фільтр</h1>
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
                                @if($errors->first('name') || $errors->first('category_id'))
                                    @include('backend.includes.menu-red-point')
                                @endif
                                <span>Дані</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#option" data-toggle="tab">
                                @if($errors->first('brand') || $errors->first('price_from') || $errors->first('price_until') || $errors->first('color') || $errors->first('size') || $errors->first('material') || $errors->first('direction') || $errors->first('sex') || $errors->first('season'))
                                    @include('backend.includes.menu-red-point')
                                @endif
                                <span>Опції</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('filters.update', $filter->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="tab-content p-0">
                                <div class="tab-pane active" id="main">
                                {{-- Содержимое основной вкладки --}}
                                    {{-- Нейм --}}
                                    <div class="form-group">
                                        <label for="name" class="red-star">Назва фільтра</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $filter->name) }}" placeholder="Введіть назву">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Категория --}}
                                    <div class="form-group">
                                        <label for="category_id" class="red-star">Категорії фільтра</label>
                                        <select id="category_id"
                                            class="form-control select2 d-none @error('category_id') is-invalid @enderror"
                                            name="category_id[]" multiple="multiple">
                                            @foreach ($categories as $category)
                                            <option @if (in_array($category->id, old('category_id', $filter->category_ids))) selected
                                                @endif
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Активность фильтра --}}
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" id="is_active"
                                                name="is_active" value="1" @if (old('is_active', $filter->is_active)) checked @endif>
                                            <label class="custom-control-label" for="is_active">Відображати фільтр на
                                                сайті</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Содержимое вкладки Опции --}}
                                <div class="tab-pane" id="option">
                                    {{-- Бренды --}}
                                    <div class="form-group">
                                        <label for="brand">Бренди</label>
                                        <select id="brand"
                                            class="form-control select2 d-none @error('brand') is-invalid @enderror"
                                            name="brand[]" multiple="multiple">
                                            @foreach (old('brand', $filter->brand) as $brand_id)
                                                @if ($brands->contains($brands->find($brand_id)))
                                                    <option selected value="{{ $brand_id }}">{{ $brands->find($brand_id)->name }}</option>
                                                @endif
                                            @endforeach
                                            @foreach ($brands->except($filter->brand) as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Цена товара ОТ --}}
                                    <div class="form-group">
                                        <label for="price_from">Найменьша ціна</label>
                                        <input type="number" min="0" max="999999" step="1"
                                            class="form-control @error('price_from') is-invalid @enderror"
                                            id="price_from" name="price_from" value="{{ old('price_from', $filter->price_from) }}"
                                            placeholder="Введіть найменьшу ціну">
                                        @error('price_from')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Цена товара ДО --}}
                                    <div class="form-group">
                                        <label for="price_until">Найбільша ціна</label>
                                        <input type="number" min="0" max="999999" step="1"
                                            class="form-control @error('price_until') is-invalid @enderror"
                                            id="price_until" name="price_until" value="{{ old('price_until', $filter->price_until) }}"
                                            placeholder="Введіть найбільшу ціну">
                                        @error('price_until')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Цвет товара --}}
                                    <div class="form-group">
                                        <label for="color">Колір</label>
                                        <select id="color"
                                            class="form-control @error('color') is-invalid @enderror"
                                            name="color[]" multiple="multiple" placeholder="Оберіть кольори">
                                            @foreach (old('color', $filter->color) as $color)
                                                <option selected>{{ $color }}</option>
                                            @endforeach
                                        </select>
                                        @error('color')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Размер товара --}}
                                    <div class="form-group">
                                        <label for="size">Розмір</label>
                                        <select id="size"
                                            class="form-control @error('size') is-invalid @enderror"
                                            name="size[]" multiple="multiple" placeholder="Оберіть розміри">
                                            @foreach (old('size', $filter->size) as $size)
                                                <option selected>{{ $size }}</option>
                                            @endforeach
                                        </select>
                                        @error('size')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Материал товара --}}
                                    <div class="form-group">
                                        <label for="material">Матеріал</label>
                                        <select id="material"
                                            class="form-control @error('material') is-invalid @enderror"
                                            name="material[]" multiple="multiple" placeholder="Оберіть матеріал">
                                            @foreach (old('material', $filter->material) as $material)
                                                <option selected>{{ $material }}</option>
                                            @endforeach
                                        </select>
                                        @error('material')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Направление товара --}}
                                    <div class="form-group">
                                        <label for="direction">Напрямок</label>
                                        <select id="direction"
                                            class="form-control @error('direction') is-invalid @enderror"
                                            name="direction[]" multiple="multiple" placeholder="Оберіть напрямок">
                                            @foreach (old('direction', $filter->direction) as $direction)
                                                <option selected>{{ $direction }}</option>
                                            @endforeach
                                        </select>
                                        @error('direction')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Пол товара --}}
                                    <div class="form-group">
                                        <label for="sex">Cтать</label>
                                        <select id="sex"
                                            class="form-control @error('sex') is-invalid @enderror"
                                            name="sex[]" multiple="multiple" placeholder="Введіть статі">
                                            @foreach (old('sex', $filter->sex) as $sex)
                                                <option selected>{{ $sex }}</option>
                                            @endforeach
                                        </select>
                                        @error('sex')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- Сезонность товара --}}
                                    <div class="form-group">
                                        <label for="season">Сезонніть</label>
                                        <select id="season"
                                            class="form-control @error('season') is-invalid @enderror"
                                            name="season[]" multiple="multiple" placeholder="Введіть сезонніть">
                                            @foreach (old('season', $filter->season) as $season)
                                                <option selected>{{ $season }}</option>
                                            @endforeach
                                        </select>
                                        @error('season')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Редагувати</button>
                            <a href="{{ route('filters.index') }}" class="btn btn-default">Відміна</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('plugins.Select2', true)

@section('js')
<script>
    $(document).ready(function() {
            $('#category_id').select2(
                {
                    theme: 'bootstrap4',
                    language: "uk",
                    @if (old('category_id') == null)
                        placeholder: "Оберіть категорії",
                    @endif
                }
            );

            $('#brand').select2(
                {
                    theme: 'bootstrap4',
                    language: "uk",
                    @if (old('brand') == null)
                        placeholder: "Оберіть бренди",
                    @endif
                }
            );

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
@endsection
