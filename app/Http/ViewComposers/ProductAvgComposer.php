<?php

namespace App\Http\ViewComposers;

// use App\Services\MemoryCache;
use Illuminate\View\View;
use App\Models\Product;

class ProductAvgComposer
{
    // use MemoryCache;

    public $avg_product;

    /**
     * Create a menu composer.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->avg_product = $this->productAvg($product);
    }

    public function productAvg($product) {
        return $product->avg('views');
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('avg_product', $this->avg_product);
    }
}
