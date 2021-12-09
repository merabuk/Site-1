<?php

namespace App\Http\ViewComposers;

// use App\Services\MemoryCache;
use Illuminate\View\View;
use App\Models\Category;

class CategoryMenuComposer
{
    // use MemoryCache;

    public $categories;

    /**
     * Create a menu composer.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->categories = $this->categories($category);
    }

    public function categories($category) {
        return $category->isMain()->with('childrens')->isActive()->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
