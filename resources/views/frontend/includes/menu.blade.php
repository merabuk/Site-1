@each('frontend.includes.menu.item-categories', $categories, 'subcategory')
@include('frontend.includes.menu.item-brands', ['brands' => $brands])
