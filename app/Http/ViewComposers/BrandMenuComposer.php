<?php

namespace App\Http\ViewComposers;

// use App\Services\MemoryCache;
use Illuminate\View\View;
use App\Models\Brand;

class BrandMenuComposer
{
    // use MemoryCache;

    public $brands;

    /**
     * Create a menu composer.
     *
     * @return void
     */
    public function __construct(Brand $brand)
    {
        $this->brands = $this->brands($brand);
    }

    public function brands($brand) {
        return $brand->isActive()->with(['mainImage', 'images'])->brandByOrder()->get(['id', 'name', 'slug']);
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('brands', $this->brands);
    }
}
