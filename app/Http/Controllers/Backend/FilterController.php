<?php

namespace App\Http\Controllers\Backend;

use App\Models\Filter;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFilterRequest;
use App\Http\Requests\UpdateFilterRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = Filter::get();
        return view('backend.filters.index', compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all(['id', 'name']);
        $categories = Category::withoutFilter()->get(['id', 'name']);
        if ($categories->isEmpty()) {
            return redirect()->route('filters.index')->with('alert-warning', 'Усі категорії мають фільтр. Новий фільтр створити не можливо. Відредагуйте існуючі.');
        }
        return view('backend.filters.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilterRequest $request)
    {
        $validatedRequest = $request->validated();
        $createdFilter = Filter::create($validatedRequest);
        $categoriesIds = $validatedRequest['category_id'];
        foreach ($categoriesIds as $categoryId) {
            $category = Category::find($categoryId);
            if ($category) {
                $category->filter()->associate($createdFilter);
                $category->save();
            };
        }
        return redirect()->route('filters.index')->with('alert-success', 'Фільтр успішно додано');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function show(Filter $filter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function edit(Filter $filter)
    {
        $brands = Brand::all(['id', 'name']);
        $withoutFiltersCategories = Category::withoutFilter()->get(['id', 'name']);
        $categories = $withoutFiltersCategories->merge($filter->categories)->sortBy('id');
        return view('backend.filters.edit', compact('categories', 'brands', 'filter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilterRequest $request, Filter $filter)
    {
        $validatedRequest = $request->validated();
        $filter->update($validatedRequest);
        $categoriesIds = $validatedRequest['category_id'];
        foreach ($filter->categories as $category) {
            $category->filter()->dissociate();
            $category->save();
        }
        foreach ($categoriesIds as $categoryId) {
            $category = Category::find($categoryId);
            if ($category) {
                $category->filter()->associate($filter);
                $category->save();
            };
        }
        return redirect()->route('filters.index')->with('alert-success', 'Фільтр успішно відредаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Filter $filter)
    {
        $filter->delete();
        //Возврат результата
        if ($request->ajax()) {
            return response('deleted');
        }
        return redirect()->back();
    }
}
