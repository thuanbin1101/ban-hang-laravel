<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Middleware\CheckLogin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use UniSharp\LaravelFilemanager\Lfm;

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
Auth::routes();

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.layouts.master');
    })->name('home');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('sliders', SliderController::class);
});



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [HomeController::class, 'ShowShop'])->name('shop');

Route::get('/detail', [HomeController::class, 'getDetailProduct'])->name('detail');

Route::get('/cart', [HomeController::class, 'ShowCart'])->name('cart');

Route::get('/checkout', [HomeController::class, 'ShowCheckout'])->name('checkout');

Route::get('/test', function () {
   session_start();
   $_SESSION['a'] = 123;
});


