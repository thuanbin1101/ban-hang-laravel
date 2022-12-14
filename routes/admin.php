<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'handleLogin'])->name('handleLogin');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'handleRegister'])->name('handleRegister');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['check-admin-auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('home');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('search', [ProductController::class, 'search'])->name('search.product');
    Route::get('customer', [CartController::class, 'index'])->name('customer.list');
    Route::delete('customer/delete/{id}', [CartController::class, 'destroy'])->name('customer.destroy');
    Route::get('order-detail/{id}', [CartController::class, 'show'])->name('orderDetail.list');
    Route::get('confirmOrder/{id}', [CartController::class, 'confirmOrder'])->name('order.confirmOrder');
});
