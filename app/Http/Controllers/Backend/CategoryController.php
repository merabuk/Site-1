<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::isMain()->get();
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $parents = Category::isMain()->get();
        return view('backend.categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedRequest = $request->validated();
        $createdCategory = Category::create($validatedRequest);
        $createdCategory->uploadImages($validatedRequest, '/images/categories');
        return redirect()->route('categories.index')->with('alert-success', 'Категорію успішно додано');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parents = Category::isMain()->get();
        return view('backend.categories.edit', compact('parents', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedRequest = $request->validated();
        $category->update($validatedRequest);
        return redirect()->route('categories.index')->with('alert-success', 'Категорію успішно відредаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {

        //Удаляем картинки категории и подкатегорий
        $category->deleteImages();
        $childrensCategories = $category->childrens->flatten();
        foreach ($childrensCategories as $child) {
            $child->deleteImages();
        }
        //Удаляем Категорию и ее подкатегории
        $category->delete();

        //Возврат результата
        if ($request->ajax()) {
            return response('deleted');
        }
        return redirect()->back();
    }
}
