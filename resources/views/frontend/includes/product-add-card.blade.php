<li class="item-product ">
    <div class="block add-new-product">
        <a href="@if (request('count') && filter_var(request('count'), FILTER_VALIDATE_INT) == true)
                    {{url()->current().'?'.http_build_query(array_merge(request()->input(), ['count' => request('count')+8]))}}{{$hashFragment ? $hashFragment.(request('count')+1) : ''}}
                @elseif (request()->missing('count') || filter_var(request('count'), FILTER_VALIDATE_INT) === false)
                    {{url()->current().'?'.http_build_query(array_merge(request()->input(), ['count' => 16]))}}{{$hashFragment ? $hashFragment.'9': ''}}
                @endif" class="link-product">
            <span class="icon icon-add"></span>
            <span>Показати більше товарів</span>
        </a>
    </div>
</li>
