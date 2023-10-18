<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


// Frontend site routes
Route::controller(FrontendController::class)->name('front.')->group(function(){
    Route::get('/','index')->name('index');
});


Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::controller(SiteController::class)->prefix('site')->name('site.')->group(function () {
        Route::get('settings/', 'settings')->name('settings');
        Route::post('settings/', 'updateSettings')->name('settings.update');
        Route::get('carousel','carousel')->name('carousel');
        Route::post('carousel','saveCarousel')->name('carousel.store');
        Route::delete('/carousel/{id}','deleteCarousel')->name('carousel.delete');
        Route::get('banners','siteBanner')->name('banners');
        Route::post('banner','saveBanner')->name('banners.save');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::resource('category', CategoryController::class);
    });
    Route::controller(ProductsController::class)->group(function () {
        Route::resource('products', ProductsController::class);
        Route::post('products/update-stock', [ProductsController::class,'updateStock'])->name('product.stock.update');
        Route::post('products/clone', [ProductsController::class,'cloneProduct'])->name('product.clone');
    });

});
