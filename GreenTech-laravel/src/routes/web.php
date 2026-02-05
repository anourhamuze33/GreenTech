<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RoleMiddeleware;

Route::get('/', function () {
    return view('productViews.formAddProduct');
});

Route::get('/ai/description/{name}', [ProductController::class, 'generateDescription'])->name('ai.description');

Route::get('/products',[ProductController::class, 'index'])->name('products.index')->middleware([AuthMiddleware::class, RoleMiddeleware::class.':client@jardinier@admin']);
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create')->middleware([AuthMiddleware::class, RoleMiddeleware::class.':admin']);
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/products/filter/{id}', [ProductController::class, 'filter'])->name('product.filter');

Route::get('/user/register', [LoginController::class, 'showRegister'])->name('auth.register');
Route::post('/user/store', [LoginController::class, 'register'])->name('user.register');
Route::get('/user/loginform', [LoginController::class, 'showLogin'])->name('auth.login');
Route::post('/user/login', [LoginController::class, 'login'])->name('user.login');
Route::get('/user/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::get('/favorites/{id}', [FavoriteController::class, 'toggle'])->middleware([AuthMiddleware::class, RoleMiddeleware::class.':client@jardinier'])->name('favorites.toggle');
Route::get('/favorites', [FavoriteController::class, 'index'])->middleware([AuthMiddleware::class, RoleMiddeleware::class.':client@jardinier'])->name('favorites.index');
Route::get('/favorites/filter/{id}', [FavoriteController::class, 'filter'])->name('favorites.filter');


Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index')->middleware([AuthMiddleware::class, RoleMiddeleware::class.':admin']);










