<?php

use App\Http\Controllers\CategoryController;
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
    Route::resource('/category', CategoryController::class);
    Route::resource('/subcategory', SubcategoryController::class)->only(['store', 'edit', 'update', 'destroy', 'show']);
    Route::get('/subcategory/create/{id}',[ SubcategoryController::class, 'create' ])->name('subcategory.create');
    Route::resource('/user', UserController::class);
});


