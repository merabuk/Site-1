<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FrontPage;
use App\Models\Article;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPage(FrontPage $page)
    {
        if ($page->has('articles')) {
            $articles = $page->articles;
            return view('frontend.'.$page->slug, compact('articles','page'));
        } else {
            return view('frontend.'.$page->slug);
        }
    }

}
