<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\CategoryMenuComposer;
use App\Http\ViewComposers\BrandMenuComposer;
use App\Http\ViewComposers\FrontPageMenuComposer;
use App\Http\ViewComposers\ProductAvgComposer;
// use App\Models\Product;
use App\Models\Article;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()//Product $product)
    {
        //View::share('avg_product', $product->avg('views'));
        View::composer(['layouts.app',
                        'frontend.catalog-product',
                        'frontend.product-new',
                        'frontend.product-sale',
                        'frontend.brand'], CategoryMenuComposer::class);
        View::composer(['layouts.app',
                        'frontend.category',
                        'frontend.catalog-product',
                        'frontend.product-new',
                        'frontend.product-sale'], BrandMenuComposer::class);
        View::composer(['frontend.catalog-product',
                        'frontend.card-product',
                        'frontend.category',
                        'frontend.main',
                        'frontend.admin-personal',
                        'frontend.product-favorit',
                        'frontend.product-new',
                        'frontend.product-sale',
                        'frontend.search.results',
                        'frontend.cart',
                        'frontend.product-brands',
                        'frontend.brand'], ProductAvgComposer::class);
        View::composer('frontend.includes.menu', FrontPageMenuComposer::class);
        View::composer('layouts.app', function($view)
        {
            $articles = Article::where('front_page_id', 7)->get();
            view()->share('footer_articles', $articles);
        });
        View::composer('frontend.includes.call-me', function($view)
        {
            $articles = Article::where('front_page_id', 3)->get();
            view()->share('call_me_articles', $articles);
        });
    }
}
