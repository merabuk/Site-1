<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\FrontPageController;
use App\Http\Controllers\Backend\FilterController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\OrderProductController;
use App\Http\Controllers\Backend\OrderOneclickController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\BrandController as FrontendBrandController;
use App\Http\Controllers\Frontend\FavoriteController as FrontendFavoriteController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CartController as FrontendCartController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\API\SearchController;
use App\Http\Controllers\Frontend\OrderOneclickController as FrontendOrderOneclickController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\MainPageController;
use App\Http\Controllers\Frontend\CaptchaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Роуты фронта
//Главная страница
Route::get('/', [MainPageController::class, 'index'])->name('main');

//Роут показа страниц категорий
Route::get('/category/{category}', [FrontendCategoryController::class, 'show'])->name('category');

//Роут показа страниц
Route::get('/{page}', [PageController::class, 'showPage'])->where('page', 'info-question|info-company|page-pay-shipping|contact|info-customer|info-partners');

// For Cart routes
Route::prefix('cart')->group(function () {
    Route::get('/', [FrontendCartController::class, 'index'])->name('cart');
    Route::post('/add', [FrontendCartController::class, 'addToCart'])->name('cart-add');
    Route::post('/remove', [FrontendCartController::class, 'removeCart'])->name('cart-remove');
    Route::post('/update', [FrontendCartController::class, 'updateCart'])->name('cart-update');
    Route::get('/clear', [FrontendCartController::class, 'clearCart'])->name('cart-clear');
    Route::post('/update-count', [FrontendCartController::class, 'updateCount'])->name('cart-update-count');
    Route::post('/total', [FrontendCartController::class, 'cartTotal'])->name('cart-total');
});

// For Orders routes
Route::prefix('orders')->group(function () {
    Route::post('/create', [FrontendOrderController::class, 'store'])->name('orders-create');
    Route::post('/{user}/repeat/{order}', [FrontendOrderController::class, 'repeatOrder'])->name('order-repeat');
    // Orders oneclick
    Route::post('/oneclick/preview', [FrontendOrderOneclickController::class, 'orderOneclickProductPreview'])->name('orders-click-preview');
    Route::post('/oneclick/product', [FrontendOrderOneclickController::class, 'orderOneclickProduct'])->name('orders-click-product');
    Route::post('/oneclick/cart', [FrontendOrderOneclickController::class, 'orderOneclickCart'])->name('orders-click-cart');
});
//Captcha
Route::get('/reload-captcha', [CaptchaController::class, 'reloadCaptcha']);
Route::get('/reload-click-captcha', [CaptchaController::class, 'reloadClickCaptcha']);

//роуты для страницы профиля покупателя
Route::get('/admin-personal/{user}', [FrontendUserController::class, 'show'])->name('admin-personal');
Route::put('/admin-personal/{user}', [FrontendUserController::class, 'update'])->name('update-admin-personal');

//Роут страницы каталога
Route::get('/catalog-product', [FrontendProductController::class, 'index'])->name('catalog-product');

//Роут страницы разпродажи
Route::get('/product-sale', [FrontendProductController::class, 'showSaleProducts'])->name('product-sale');

//Роут страницы новинок
Route::get('/product-new', [FrontendProductController::class, 'showNewProducts'])->name('product-new');

//роут отображения товара
Route::get('/product/{product}', [FrontendProductController::class, 'show'])->name('card-product');

//Роут для брендов
Route::get('/brands', [FrontendBrandController::class, 'index'])->name('product-brands');
Route::get('/brand/{brand}', [FrontendBrandController::class, 'show'])->name('brand');

//страница с условиями использования сайта
Route::get('/terms-check', function () {
    return view('frontend.terms-check');
});

// //тестовая страница тестирование закрашивания свж
// Route::get('/test-brands', function () {
//     return view('frontend.old.test-brands');
// });

// Favorite product routes
Route::get('/product-favorit', [FrontendFavoriteController::class, 'index'])->name('product-favorit');
Route::middleware(['auth'])->group(function(){
    Route::post('/product-favorit/add', [FrontendFavoriteController::class, 'addToFavorite'])->name('product-favorit-add');
    Route::post('/product-favorit/remove', [FrontendFavoriteController::class, 'removeToFavorite'])->name('product-favorit-remove');
});

// Login Routes...
Route::get('admin-panel', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('admin.login');
Route::post('login-user', [LoginController::class, 'loginUser'])->name('user.login');

// Logout Routes...
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
//Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Password Confirmation Routes...
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

// Email Verification Routes...
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// Auth::routes();

//Роут поиска
Route::get('/search', [SearchController::class, 'search']);

//Роуты админ панели
Route::prefix('home')->middleware(['auth','role:superadmin,admin,manager'])->group(function () {
    //Панель управления
    Route::get('/', [HomeController::class, 'index'])->name('home');
    //Управление пользователями
    Route::resource('/users', UserController::class);
    //Управление брэндами
    Route::resource('/brands', BrandController::class);
    //Управление категориями
    Route::resource('/categories', CategoryController::class);
    //Управление товарами
    Route::get('/products/import', [ProductController::class, 'import'])->name('products.import');
    Route::post('/products/importation', [ProductController::class, 'importation'])->name('products.importation');
    Route::resource('/products', ProductController::class);
    //Управление заказами
    Route::get('/orders/export/', [OrderController::class, 'export'])->name('orders.export');
    Route::resource('/orders', OrderController::class);
    //Управление товарами в заказе
    Route::resource('/order/{order}/order-products', OrderProductController::class)->except(['index', 'show']);
    //Просмотр и удаление заказов в один клик
    Route::resource('/order-oneclicks', OrderOneclickController::class)->only(['index', 'show', 'destroy']);
    //Управление фильтрами
    Route::resource('/filters', FilterController::class);
    //Управление страницами
    Route::resource('/front-pages', FrontPageController::class)->except(['create', 'store', 'show', 'destroy']);
    Route::post('/front-pages/articles-update/{front_page}', [FrontPageController::class, 'articlesUpdate'])->name('articlesUpdate');
});
