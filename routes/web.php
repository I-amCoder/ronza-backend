<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SiteController;
use Illuminate\Routing\RouteGroup;
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

Route::get('/', function () {
    return to_route('home');
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::controller(SiteController::class)->prefix('site')->name('site.')->group(function () {
        Route::get('settings/', 'settings')->name('settings');
        Route::post('settings/', 'updateSettings')->name('settings.update');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::resource('category', CategoryController::class);
    });
    Route::controller(ProductsController::class)->group(function () {
        Route::resource('products', ProductsController::class);
    });
});
