<?php

use App\Http\Controllers\Backend\API\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BrandController as FrontendBrandController;
use App\Http\Controllers\Frontend\API\LoggedController;
use App\Http\Controllers\Frontend\API\SearchController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Роут для отображения данных по бренду
Route::post('/brand-details', [FrontendBrandController::class, 'showApi'])->name('brand-details');

//Роут проверки данных пользователя
Route::middleware('auth:api')->get('/check-user', [LoggedController::class, 'getStatusDataUser']);

//Роуты работы с картинками
Route::apiResource('images', ImageController::class);

//Роут поиска
Route::get('/search', [SearchController::class, 'search']);
