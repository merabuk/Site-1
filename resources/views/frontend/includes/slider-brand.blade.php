<section class="section-slider-brand">
    <div class="container">
        <ul class="slider-brand">
            @foreach($brands as $brand)
                @if ($brand->mainImage->isNotEmpty())
                    <li class="slider-brand-item">
                        <a href="{{ route('product-brands') }}?brand={{ $brand->slug }}" class="slider-link">
                            <img src="{{ asset('storage/'.$brand->mainImage->first()->path) }}" alt="photo-product"
                                class="img img-fluid @if(request()->query('brand') != $brand->slug) filtered-img @endif"
                                style="max-height: 67px">
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</section>
