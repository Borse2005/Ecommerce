<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderHistory;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\RatingController;
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
Route::post('/dashboard/{id}', [DashboardController::class, 'show'])->name('show.dash');
Route::resource('/details', ProductDetailController::class);
Route::resource('/cart', CartController::class);

Route::middleware(['auth', 'role:normal'])->group(function(){
    Route::resource('/user', UserController::class);
    Route::resource('/address', AddressController::class)->except('destroy');
    Route::delete('/address/delete', [AddressController::class, 'destroy'])->name('address.destroy');
    Route::resource('/order', OrderController::class);
    Route::resource('history', OrderHistory::class);
});

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function(){
    
    Route::get('/subcategory/show/{subcategory}',[SubcategoryController::class, 'show'])->name('subcategory.show');
    Route::get('/subcategory/index',[SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::post('/subcategory/store/',[SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::put('/subcategory/{subcategory}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/{subcategory}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::get('/subcategory/create/{id}', [ SubcategoryController::class, 'create' ])->name('subcategory.create');
    Route::delete('/subcategory/destroy', [ SubcategoryController::class, 'destroy' ])->name('subcategory.destroy');
    Route::delete('/products/delete', [ProductController::class, 'destroy'])->name('products.delete');

    Route::resource('/category', CategoryController::class)->except('destroy');
    Route::delete('/category/delete', [CategoryController::class, 'destroy'])->name('category_destroy');
    Route::resource('/product', ProductController::class)->except('destroy');
    Route::resource('/colors', ColorController::class)->except(['show', 'destroy']);
    Route::delete('/colors/delete', [ColorController::class, 'destroy'])->name('colors.destroy');

});


