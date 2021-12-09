<?php

namespace App\Http\ViewComposers;

// use App\Services\MemoryCache;
use Illuminate\View\View;
use App\Models\FrontPage;

class FrontPageMenuComposer
{
    // use MemoryCache;

    public $front_pages;

    /**
     * Create a menu composer.
     *
     * @return void
     */
    public function __construct(FrontPage $front_page)
    {
        $this->front_pages = $this->front_pages($front_page);
    }

    public function front_pages($front_page) {
        return $front_page->all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('front_pages', $this->front_pages);
    }
}
