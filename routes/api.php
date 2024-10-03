<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserNameController;
use App\Http\Controllers\Api\TagController;
use App\Models\Product;
use App\Models\UserName;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/testApi",function(){
    return "Hello from api";
});

Route::get('categories',[CategoryController::class, 'index']);
Route::get('products',[ProductController::class, 'index']);
Route::get('username',[UserNameController::class, 'index']);

Route::get('categories/{id}',[CategoryController::class, 'show']);
Route::get('products/{id}',[ProductController::class, 'show']);
Route::get('username',[UserName::class, 'show']);

Route::post('categories',[CategoryController::class, 'create']);
Route::post('products',[ProductController::class, 'create']);
Route::post('username',[UserNameController::class, 'create']);

Route::delete('categories/{id}',[CategoryController::class, 'destroy']);
Route::delete('products/{id}',[ProductController::class, 'destroy']);
Route::delete('username/{id}',[UserNameController::class, 'destroy']);


Route::put('categories/{id}',[CategoryController::class, 'update']);
Route::put('products/{id}',[ProductController::class, 'update']);
Route::put("username/{id}",[UserNameController::class,"update"]);
Route::apiResource("/products",ProductController::class);
Route::apiResource("/categories",CategoryController::class);
Route::apiResource("/username",UserNameController::class);

Route::apiResource("/tags",TagController::class);
Route::get("/filterTag",[TagController::class,'filter']);
