<li>
    <div class="accordion-header">
        <a href="{{ route('category', $subcategory->slug) }}" class="nav-title nav-link nav-link-uppercase">
            <span>{{ $subcategory->name }}</span>
        </a>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse{{ $subcategory->id }}"
            aria-expanded="false" aria-controls="collapse{{ $subcategory->id }}" id="heading{{ $subcategory->id }}">
            <i class="icon icon-next"></i>
        </a>
    </div>
    <div id="collapse{{ $subcategory->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#catalogAccordion">
        <ul class="col-2-lg">
            @each('frontend.includes.menu.rows.row-category', $subcategory->childrens, 'children')
        </ul>
    </div>
</li>
