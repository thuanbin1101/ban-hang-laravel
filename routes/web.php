<?php


use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Middleware\CheckLogin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\Admin\LoginController;

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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});

//fe
Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::get('/category/{slug}', [HomeController::class, 'ShowCategory'])->name('client.category');


Route::get('/checkout', [HomeController::class, 'showCheckout'])->name('client.checkout');

Route::get('/detail/{id}', [HomeController::class, 'getProductDetail'])->name('client.detail');

//cart
Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('client.addToCart');
Route::get('/cart', [CartController::class, 'show'])->name('client.cart');
Route::post('/update-cart', [CartController::class, 'update'])->name('client.updateCart');
Route::post('/delete-cart', [CartController::class, 'destroy'])->name('client.deleteCart');
Route::post('/checkout-cart', [CartController::class, 'checkoutCart'])->name('client.checkoutCart');


// Authentication Client
Route::get('client/login', [LoginController::class, 'loginClient'])->name('client.login');
Route::post('client/login', [LoginController::class, 'handleLoginClient'])->name('client.handleLogin');
Route::post('client/logout', [LoginController::class, 'logoutClient'])->name('client.logout');
Route::get('client/register', [LoginController::class, 'registerClient'])->name('client.register');
Route::post('client/register', [LoginController::class, 'handleRegisterClient'])->name('client.handleRegister');
