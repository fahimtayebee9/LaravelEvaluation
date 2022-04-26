<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;

// , 'middleware' => 'auth'
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [PageController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class, [ 'names' => [
        'index' => 'products.index',
        'store' => 'products.store',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]]);

    Route::resource('categories', CategoryController::class, [ 'names' => [
        'index' => 'categories.index',
        'store' => 'categories.store',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]]);

    Route::resource('subcategories', SubCategoryController::class, [ 'names' => [
        'index' => 'subcategories.index',
        'store' => 'subcategories.store',
        'update' => 'subcategories.update',
        'destroy' => 'subcategories.destroy',
    ]]);
});
