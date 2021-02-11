<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BusinessCategoryController;
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
    return view('welcome');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    //User
    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    //Shop
    Route::get('/shop', [ShopController::class, "index"])->name('shop');
    Route::get('/shop/create', [ShopController::class, "create"])->name('shop.create');
    Route::post('/shop/store', [ShopController::class, "store"])->name('shop.store');

    //Shop Category
    Route::get('/business-category', [BusinessCategoryController::class, "index"])->name('business-category');
    Route::get('/business-category/create', [BusinessCategoryController::class, "create"])->name('business-category.create');
    Route::post('/business-category/store', [BusinessCategoryController::class, "store"])->name('business-category.post');
});
