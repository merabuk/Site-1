@extends('layouts.app')

@section('title')
{{ $page->title }}
@endsection

@section('content')
@include('frontend.includes.breadcrumb', ['crumb' => $page->title])
<section class="section-info question">
    <div class="container">
        <h2 class="title-section-2 title-section pb-0">{{ $page->title }}</h2>
        <h3 class="title">{{ $articles[0]->content }}</h3>
        <p class="text-break">{{ $articles[1]->content }}</p>
        <ul class="list-decor-arrow">
            <li>
                <div>
                    {{ $articles[2]->content }}
                </div>
            </li>
            <li>
                <div>
                    {{ $articles[3]->content }}
                </div>
            </li>
            <li>
                <ul>
                    <li>{{ $articles[4]->content }}</li>
                    <li>{{ $articles[5]->content }}</li>
                    <li>{{ $articles[6]->content }}</li>
                </ul>

            </li>
        </ul>
        <h3 class="title text-left">{{ $articles[7]->content }}</h3>
        <p class="text-break">
            <span class="strong-text">{{ $articles[8]->content }} </span>{{ $articles[9]->content }}
        </p>
        <div class="table-wrrap">
            <table class="table-info">
                <thead><tr><td>Дюйми</td><td>Сантиметри</td><td>Розмір головного убора</td><td>Розмір шолома </td></tr></thead>
                <tbody>
                <tr><td>20,87 - 21,26</td><td>53 - 54</td><td>6-5/8 - 6-3/4</td><td>XS</td></tr>
                <tr><td>21,65 - 22,05</td><td>55 - 56</td><td> 6-7/8 - 7</td><td>S</td></tr>
                <tr><td>22,44 - 22,83</td><td>57 - 58</td><td>7-1/8 - 7-1/4</td><td>M</td></tr>
                <tr><td>23,23 - 23,62</td><td>59 - 60</td><td>7-3/8 - 7-3/4</td><td>L</td></tr>
                <tr><td>24,02 - 24,41</td><td>61 - 62</td><td> 7-5/8 - 7-7/8</td><td>XL</td></tr>
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection
