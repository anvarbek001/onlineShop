<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SellerController;
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

Route::get('/posts/show/{id}',[PostController::class,'show'])->name('posts.show');
Route::get('/seller',[SellerController::class,'seller'])->name('seller');
Route::post('/sellerRegister',[SellerController::class,'sellerRegister'])->name('sellerRegister');
Route::post('/store',[PostController::class,'store'])->name('store');
Route::put('/update/{id}',[PostController::class,'update'])->name('update');
Route::delete('/destroy/{id}',[PostController::class,'destroy'])->name('destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account',[HomeController::class,'account'])->name('account');
Route::get('/exit',[HomeController::class,'exit'])->name('exit');

// routes/web.php
Route::get('/search', [SearchController::class, 'search'])->name('search');

