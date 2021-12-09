<span>Сортування:</span>
<div class="dropdown ">
    <button class="btn btn-light dropdown-toggle rounded-0 ml-1 ml-lg-3 icon-arrow-select" type="button" id="dropdown-sorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @switch(request('sort'))
            @case('pop')
                За популярністю
                @break
            @case('pop')
                За популярністю
                @break
            @case('up')
                Ціна за зростанням
                @break
            @case('dwn')
                Ціна за спаданням
                @break
            @case('promo')
                Акційні товари
                @break
            @default
            Новий товар
        @endswitch
    </button>
    <div class="dropdown-menu rounded-0" aria-labelledby="dropdown-sorting">
        <a class="dropdown-item text-dark @if (request('sort') == 'new') active @endif" href="{{url()->current().'?'.http_build_query(array_merge(request()->input(), ['sort' => 'new']))}}">Новий товар</a>
        <a class="dropdown-item text-dark @if (request('sort') == 'pop') active @endif" href="{{url()->current().'?'.http_build_query(array_merge(request()->input(), ['sort' => 'pop']))}}">За популярністю</a>
        <a class="dropdown-item text-dark @if (request('sort') == 'up') active @endif" href="{{url()->current().'?'.http_build_query(array_merge(request()->input(), ['sort' => 'up']))}}">Ціна за зростанням</a>
        <a class="dropdown-item text-dark @if (request('sort') == 'dwn') active @endif" href="{{url()->current().'?'.http_build_query(array_merge(request()->input(), ['sort' => 'dwn']))}}">Ціна за спаданням</a>
        <a class="dropdown-item text-dark @if (request('sort') == 'promo') active @endif" href="{{url()->current().'?'.http_build_query(array_merge(request()->input(), ['sort' => 'promo']))}}">Акційні товари</a>
    </div>
</div>
