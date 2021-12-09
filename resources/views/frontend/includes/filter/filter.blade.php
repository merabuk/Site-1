<div class="collapse" id="filter-collapse">
    <form class="filter-catalog">
        <div class="accordion" id="accordionExample">
            {{-- Бренды --}}
            @if (!empty($category->filter) && $category->filter->is_active && $category->filter->brand)
            <div class="card">
                <div class="card-header" id="headingBrand">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                            <span class="title">Виробник</span>
                            <span class="icon-plus">+</span>
                            <span class="icon-minus">-</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseBrand" class="collapse show block-scroll" aria-labelledby="headingBrand">
                    <div class="card-body scroll">
                        @foreach ($category->filter->brand as $brand_id)
                            @if ($brands->contains($brands->find($brand_id)))
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="brand[]" value="{{ $brand_id }}" @if (null !== request('brand') && in_array($brand_id, request('brand'))) checked @endif id="brand{{ $loop->index }}">
                                <label class="form-check-label" for="brand{{ $loop->index }}">
                                    {{$brands->find($brand_id)->name}}
                                </label>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            {{-- Цена --}}
            <div class="card">
                <div class="card-header" id="headingPrice">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapsePrice" aria-expanded="true" aria-controls="collapsePrice">
                            <span class="title">Вартість</span>
                            <span class="icon-plus">+</span>
                            <span class="icon-minus">-</span>
                        </button>
                    </h2>
                </div>
                <div id="collapsePrice" class="collapse show" aria-labelledby="headingPrice">
                    <div class="card-body block-price">
                        <span>Від</span>
                        <input class="form-control" type="text" name="price_from" min="0" max="999999" step="1" placeholder="100"
                            @if (!empty($category->filter) && $category->filter->is_active && $category->filter->price_from)
                                value="{{ $category->filter->price_from }}"
                            @else
                                value="{{ request('price_from') }}"
                            @endif
                        >
                        <span>До</span>
                        <input class="form-control" type="text" name="price_until" min="0" max="999999" step="1" placeholder="10000"
                            @if (!empty($category->filter) && $category->filter->is_active && $category->filter->price_until)
                                value="{{ $category->filter->price_until }}"
                            @else
                                value="{{ request('price_until') }}"
                            @endif
                        >
                    </div>
                </div>
            </div>
            {{-- Цвет --}}
            @if (!empty($category->filter) && $category->filter->is_active && $category->filter->color)
            <div class="card">
                <div class="card-header" id="headingColor">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseColor" aria-expanded="true" aria-controls="collapseColor">
                            <span class="title">Колір</span>
                            <span class="icon-plus">+</span>
                            <span class="icon-minus">-</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseColor" class="collapse show block-scroll" aria-labelledby="headingColor">
                    <div class="card-body scroll">
                        @foreach ($category->filter->color as $color)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="color[]" value="{{ $color }}" @if (null !== request('color') && in_array($color, request('color'))) checked @endif id="color{{ $loop->index }}">
                            <label class="form-check-label" for="color{{ $loop->index }}">
                                {{ $color }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            {{-- Размер --}}
            @if (!empty($category->filter) && $category->filter->is_active && $category->filter->size)
            <div class="card">
                <div class="card-header" id="headingSize">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseSize" aria-expanded="true" aria-controls="collapseSize">
                            <span class="title">Розмір</span>
                            <span class="icon-plus">+</span>
                            <span class="icon-minus">-</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseSize" class="collapse show block-scroll" aria-labelledby="headingSize">
                    <div class="card-body scroll">
                        @foreach ($category->filter->size as $size)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="size[]" value="{{ $size }}" @if (null !== request('size') && in_array($size, request('size'))) checked @endif id="size{{ $loop->index }}">
                            <label class="form-check-label" for="size{{ $loop->index }}">
                                {{ $size }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            {{-- Материал --}}
            @if (!empty($category->filter) && $category->filter->is_active && $category->filter->material)
            <div class="card">
                <div class="card-header" id="headingMaterial">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseMaterial" aria-expanded="true" aria-controls="collapseMaterial">
                            <span class="title">Матеріал</span>
                            <span class="icon-plus">+</span>
                            <span class="icon-minus">-</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseMaterial" class="collapse show block-scroll" aria-labelledby="headingMaterial">
                    <div class="card-body scroll">
                        @foreach ($category->filter->material as $material)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="material[]" value="{{ $material }}" @if (null !== request('material') && in_array($material, request('material'))) checked @endif id="material{{ $loop->index }}">
                            <label class="form-check-label" for="material{{ $loop->index }}">
                                {{ $material }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            {{-- Направление --}}
            @if (!empty($category->filter) && $category->filter->is_active && $category->filter->direction)
            <div class="card">
                <div class="card-header" id="headingDirection">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseDirection" aria-expanded="true" aria-controls="collapseDirection">
                            <span class="title">Напрямок</span>
                            <span class="icon-plus">+</span>
                            <span class="icon-minus">-</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseDirection" class="collapse show block-scroll" aria-labelledby="headingDirection">
                    <div class="card-body scroll">
                        @foreach ($category->filter->direction as $direction)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="direction[]" value="{{ $direction }}" @if (null !== request('direction') && in_array($direction, request('direction'))) checked @endif id="direction{{ $loop->index }}">
                            <label class="form-check-label" for="direction{{ $loop->index }}">
                                {{ $direction }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            {{-- Пол --}}
            @if (!empty($category->filter) && $category->filter->is_active && $category->filter->sex)
            <div class="card">
                <div class="card-header" id="headingSex">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseSex" aria-expanded="true" aria-controls="collapseSex">
                            <span class="title">Стать</span>
                            <span class="icon-plus">+</span>
                            <span class="icon-minus">-</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseSex" class="collapse show block-scroll" aria-labelledby="headingSex">
                    <div class="card-body scroll">
                        @foreach ($category->filter->sex as $sex)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sex[]" value="{{ $sex }}" @if (null !== request('sex') && in_array($sex, request('sex'))) checked @endif id="sex{{ $loop->index }}">
                            <label class="form-check-label" for="sex{{ $loop->index }}">
                                {{ $sex }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            {{-- Сезонность --}}
            @if (!empty($category->filter) && $category->filter->is_active && $category->filter->season)
            <div class="card">
                <div class="card-header" id="headingSeason">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseSeason" aria-expanded="true" aria-controls="collapseSeason">
                            <span class="title">Сезонність</span>
                            <span class="icon-plus">+</span>
                            <span class="icon-minus">-</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseSeason" class="collapse show block-scroll" aria-labelledby="headingSeason">
                    <div class="card-body scroll">
                        @foreach ($category->filter->season as $season)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="season[]" value="{{ $season }}" @if (null !== request('season') && in_array($season, request('season'))) checked @endif id="season{{ $loop->index }}">
                            <label class="form-check-label" for="season{{ $loop->index }}">
                                {{ $season }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

        </div>
        <div class="d-flex justify-content-between">
            {{-- <button type="submit" class="btn-custom-project">Фільтрувати</button> --}}
            <a href="{{ url()->current() }}" class="btn-custom-project delete">Очистити</a>
        </div>
    </form>
</div>
