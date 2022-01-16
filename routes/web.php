<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
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


Route::get('back', function () {
    return redirect()->back();
})->name('back');

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::resource('/dash', DashboardController::class);
Route::resource('/details', ProductDetailController::class);
Route::resource('/cart', CartController::class);

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function(){
    
    Route::get('/subcategory/show/{subcategory}',[SubcategoryController::class, 'show'])->name('subcategory.show');
    Route::post('/subcategory/store/',[SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::put('/subcategory/{subcategory}',[SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/{subcategory}',[SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::get('/subcategory/create/{id}',[ SubcategoryController::class, 'create' ])->name('subcategory.create');
    Route::delete('/subcategory/destroy',[ SubcategoryController::class, 'destroy' ])->name('subcategory.destroy');
    Route::delete('/products/delete', [ProductController::class, 'destroy'])->name('products.delete');

    Route::resource('/category', CategoryController::class)->except('destroy');
    Route::delete('/category/delete', [CategoryController::class, 'destroy'])->name('category_destroy');
    Route::resource('/user', UserController::class);
    Route::resource('/product', ProductController::class)->except('destroy');

});


