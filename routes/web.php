<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\StoreController;
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

Route::get('/', [PostController::class,'index'])->name('index');

Route::get('/stores',[PostController::class,'stores'])->name('stores');
Route::get('/language/{locale}',[LanguageController::class,'change_locale'])->name('locale_change');

Route::get('/posts/show/{id}',[PostController::class,'show'])->name('posts.show');
Route::get('/seller',[SellerController::class,'seller'])->name('seller');
Route::post('/sellerRegister',[SellerController::class,'sellerRegister'])->name('sellerRegister');
Route::post('/store',[PostController::class,'store'])->name('store');
Route::get('/edit/{id}',[PostController::class,'edit'])->name('edit');
Route::put('/update/{id}',[PostController::class,'update'])->name('update');
Route::delete('/destroy/{id}',[PostController::class,'destroy'])->name('destroy');
Route::get('/products',[PostController::class,'products'])->name('products');

Route::get('categories/{id}',[PostController::class,'categories'])->name('categories');

Route::get('/addStore',[StoreController::class,'addStore'])->name('addStore');
Route::post('/storeSave',[StoreController::class,'storeSave'])->name('storeSave');

Route::get('/store-products/{id}',[StoreController::class,'storeProducts'])->name('store-products');
Route::get('/shop-cart',[ShopCartController::class,'shopCart'])->name('shopCart');
Route::delete('/store-delete/{id}',[StoreController::class,'storeDelete'])->name('storeDelete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account',[HomeController::class,'account'])->name('account');
Route::get('/exit',[HomeController::class,'exit'])->name('exit');

// routes/web.php
Route::get('/search', [SearchController::class, 'search'])->name('search');

