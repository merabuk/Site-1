<li>
    <div class="accordion-header">
        <a href="{{ route('product-brands') }}?brand={{ $brands->first()->slug }}" class="nav-title nav-link nav-link-uppercase">
            <span>бренди</span>
        </a>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"  id="headingThree">
            <i class="icon icon-next"  ></i>
        </a>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#catalogAccordion">
        <ul class="brand-list col-3-lg">
            @each('frontend.includes.menu.rows.row-brand', $brands, 'brand')
        </ul>
    </div>
</li>
