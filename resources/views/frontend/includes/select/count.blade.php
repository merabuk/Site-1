<span>Товарів на сторінці:</span>
<div class="dropdown button-select-number">
    <button class="btn btn-light dropdown-toggle rounded-0 ml-3 icon-arrow-select" type="button" id="dropdown-count" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @switch(request('count'))
            @case('12')
                12
                @break
            @case('14')
                14
                @break
            @default
            8
        @endswitch
    </button>

    <div class="dropdown-menu rounded-0" aria-labelledby="dropdown-count">
        <a class="dropdown-item @if (request('count') == '8' || request()->missing('count')) active @endif" href="{{url()->current().'?'.http_build_query(array_merge(request()->input(), ['count' => 8]))}}">8</a>
        <a class="dropdown-item @if (request('count') == '12') active @endif" href="{{url()->current().'?'.http_build_query(array_merge(request()->input(), ['count' => 12]))}}">12</a>
        <a class="dropdown-item @if (request('count') == '14') active @endif" href="{{url()->current().'?'.http_build_query(array_merge(request()->input(), ['count' => 14]))}}">14</a>
    </div>
</div>
