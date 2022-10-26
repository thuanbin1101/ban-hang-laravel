<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('home');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('search', [ProductController::class,'search'])->name('search.product');
    Route::get('customer', [CartController::class,'index'])->name('customer.list');
    Route::get('order-detail/{id}', [CartController::class,'show'])->name('orderDetail.list');
});
