<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get();
        return view('backend.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $validatedRequest = $request->validated();
        $createdBrand = Brand::create($validatedRequest);
        $createdBrand->uploadImages($validatedRequest, '/images/categories');
        //добавление новых видео ссылок
        $createdBrand->uploadVideos($validatedRequest);
        return redirect()->route('brands.index')->with('alert-success', 'Бренд успішно додано');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validatedRequest = $request->validated();
        $brand->update($validatedRequest);
        //удаление существующих видео ссылок
        $brand->deleteVideos();
        //добавление новых видео ссылок
        $brand->uploadVideos($validatedRequest);
        return redirect()->route('brands.index')->with('alert-success', 'Бренд успішно відредаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Brand $brand)
    {
        //Удаляем картинки бренда
        $brand->deleteImages();
        //Удаляем видео бренда
        $brand->deleteVideos();
        //Удаляем бренд
        $brand->delete();
        if ($request->ajax()) {
            return response('deleted');
        }
        return redirect()->back();
    }
}
