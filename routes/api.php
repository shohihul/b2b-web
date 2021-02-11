<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BusinessController;
use App\Http\Controllers\API\BusinessCategoryController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/get_service_category', [BusinessCategoryController::class, 'getServiceCategory']);
Route::get('/get_goods_category', [BusinessCategoryController::class, 'getGoodsCategory']);

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    
    //Business
    Route::post('/shop/store', [BusinessController::class, "store"]);
});
