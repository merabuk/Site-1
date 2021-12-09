<div class="collapse" id="filter-collapse">
    <form class="filter-catalog">
        <div class="accordion" id="accordionExample">
            @if (isset($brands))
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
                            @foreach ($brands as $brand)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="brand[]" value="{{ $brand->id }}" @if (null !== request('brand') && in_array($brand->id, request('brand'))) checked @endif id="brand{{ $loop->index }}">
                                    <label class="form-check-label" for="brand{{ $loop->index }}">{{$brand->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header" id="headingCategory">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                            <span class="title">Категорія</span>
                            <span class="icon-plus">+</span>
                            <span class="icon-minus">-</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseCategory" class="collapse show block-scroll" aria-labelledby="headingCategory">
                    <div class="card-body scroll">
                        @each('frontend.includes.filter.static-filter-row-category', $categories, 'category')
                    </div>
                </div>
            </div>
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
                            value="{{ request('price_from') }}">
                        <span>До</span>
                        <input class="form-control" type="text" name="price_until" min="0" max="999999" step="1" placeholder="10000"
                            value="{{ request('price_until') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            {{-- <button class="btn-custom-project">Фільтрувати</button> --}}
            <a href="{{ url()->current() }}" class="btn-custom-project delete">Очистити</a>
        </div>
        {{-- <div class="d-flex justify-content-between">
            Знайдено {{ $products->total() }} товарів відповідних вашому запиту.
        </div> --}}
    </form>
</div>
