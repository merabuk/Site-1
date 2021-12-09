<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\ImportProductRequest;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    private $liveInCache = 900;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['mainImage', 'addedImages'])->get();
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        $product = new Product();
        $dim_units = $product->dim_units;
        $weight_units = $product->weight_units;
        return view('backend.products.create', compact('brands', 'categories','dim_units','weight_units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validatedRequest = $request->validated();
        $categoryIds = $validatedRequest['category_id'];
        $createdProduct = Product::create($validatedRequest);
        $createdProduct->categories()->attach($categoryIds);
        $createdProduct->uploadImages($validatedRequest, '/images/products');
        //добавление новых видео ссылок
        $createdProduct->uploadVideos($validatedRequest);
        $this->setProducts();
        return redirect()->route('products.index')->with('alert-success', 'Товар успішно додано');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        $dim_units = $product->dim_units;
        $weight_units = $product->weight_units;
        return view('backend.products.edit', compact('product','brands', 'categories','dim_units','weight_units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedRequest = $request->validated();
        $categoryIds = $validatedRequest['category_id'];
        $product->update($validatedRequest);
        $product->categories()->sync($categoryIds);
        //удаление существующих видео ссылок
        $product->deleteVideos();
        //добавление новых видео ссылок
        $product->uploadVideos($validatedRequest);
        $this->setProducts();
        return redirect()->route('products.index')->with('alert-success', 'Товар успішно відредаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        //Удаляем картинки товара
        $product->deleteImages();
        //Удаляем видео товара
        $product->deleteVideos();
        //Удаляем Товар
        $product->delete();

        //Возврат результата
        if ($request->ajax()) {
            return response('deleted');
        }
        return redirect()->back();
    }

    /**
     * Show Import from Excel form
     */
    public function import()
    {
        return view('backend.products.import');
    }

    /**
     * Importing
     */
    public function importation(ImportProductRequest $request)
    {
        $validatedRequest = $request->validated();
        try {
        Excel::import(new ProductsImport, $validatedRequest['file']);
        }
        catch (ValidationException $e) {
            $errors = $e->failures();
            return redirect()->route('products.import')->with('import-validation', $errors);
        };
        return redirect()->route('products.import');
    }

    // кэширование результатов для фронта
    public function setProducts()
    {
        if(Cache::has('products')) {
            Cache::forget('products');
        }
        $products = Product::isActive()->with(['mainImage', 'categories'])->get();
        Cache::put('products', $products, $this->liveInCache);
    }
}
