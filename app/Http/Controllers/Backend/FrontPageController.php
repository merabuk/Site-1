<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FrontPage;
use App\Models\Article;
use App\Http\Requests\StoreFrontPageRequest;
use App\Http\Requests\UpdateFrontPageRequest;

class FrontPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $front_pages = FrontPage::get();
        return view('backend.front_pages.index', compact('front_pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontPage $front_page)
    {
        $articles = $front_page->articles;
        return view('backend.front_pages.edit', compact('front_page', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFrontPageRequest $request, FrontPage $front_page)
    {
        $validatedRequest = $request->validated();
        $front_page->update($validatedRequest);
        return redirect()->route('front-pages.index')->with('alert-success', 'Сторінку успішно відредаговано');
    }

    /**
     * Update the content in frontend page.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function articlesUpdate(Request $request, FrontPage $front_page)
    {
        $articles = $front_page->articles;
        foreach ($articles as $article) {
            $num_article = $article->num_article;
            $article->update([
                'content' => $request->input('content-'.$num_article),
            ]);
        }
        return redirect()->route('front-pages.index')->with('alert-success', 'Сторінку успішно відредаговано');
    }
}
