<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserCodeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\RoleMiddeleware;

Route::get('/', function () {
    return view('productViews.formAddProduct');
});

Route::get('/ai/description/{name}', [ProductController::class, 'generateDescription'])->name('ai.description');

Route::get('/products',[ProductController::class, 'index'])->name('products.index')->middleware([AuthMiddleware::class]);
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('product.show')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::delete('/products/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware([AuthMiddleware::class]);
Route::get('/products/filter/{id}', [ProductController::class, 'filter'])->name('product.filter')->middleware([AuthMiddleware::class, CheckPermission::class]);

Route::get('/user', [UserController::class, 'index'])->name('users.index')->middleware([AuthMiddleware::class]);
Route::get('/user/add', [UserController::class, 'showRegister'])->name('auth.register')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::post('/user/store', [UserController::class, 'register'])->name('user.register')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware([AuthMiddleware::class, CheckPermission::class]);

Route::get('/user/loginform', [LoginController::class, 'showLogin'])->name('auth.login');
Route::post('/user/login', [LoginController::class, 'login'])->name('user.login');
Route::get('/user/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::get('/role', [RolesController::class, 'index'])->name('roles.index')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::get('/role/create', [RolesController::class, 'create'])->name('role.create')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::post('/role/store', [RolesController::class, 'store'])->name('role.store')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::get('/role/edit/{id}', [RolesController::class, 'edit'])->name('role.edit')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::put('/role/create/{id}', [RolesController::class, 'update'])->name('role.update')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::delete('/role/delete/{role}', [RolesController::class, 'destroy'])->name('role.destroy')->middleware([AuthMiddleware::class, CheckPermission::class]);

Route::patch('/favorites/{id}', [FavoriteController::class, 'toggle'])->middleware([AuthMiddleware::class, CheckPermission::class])->name('favorites.toggle');
Route::get('/favorites', [FavoriteController::class, 'index'])->middleware([AuthMiddleware::class, CheckPermission::class])->name('favorites.index');
Route::get('/favorites/filter/{id}', [FavoriteController::class, 'filter'])->name('favorites.filter')->middleware([AuthMiddleware::class, CheckPermission::class]);
Route::get('/products/export', [ExportData::class, 'export'])->middleware([AuthMiddleware::class, CheckPermission::class])->name('products.export');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index')->middleware([AuthMiddleware::class, CheckPermission::class]);

Route::get('/2fa', [LoginController::class, 'index'])->name('2fa.index');
Route::post('/2fa/verify', [LoginController::class, 'store'])->name('2fa.post');
Route::get('/2fa/reset', [LoginController::class, 'resend'])->name('2fa.resend');










