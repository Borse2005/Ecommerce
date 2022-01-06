<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function(){
    Route::get('/subcategory/show/{subcategory}',[SubcategoryController::class, 'show'])->name('subcategory.show');
    Route::post('/subcategory/store/',[SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::resource('/category', CategoryController::class);
    Route::put('/subcategory/{subcategory}',[SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/{subcategory}',[SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::get('/subcategory/create/{id}',[ SubcategoryController::class, 'create' ])->name('subcategory.create');
    Route::delete('/subcategory/destroy/{subcategory}',[ SubcategoryController::class, 'destroy' ])->name('subcategory.destroy');
    Route::resource('/user', UserController::class);
    Route::resource('/product', ProductController::class);
});


