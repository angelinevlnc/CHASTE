<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\MenuController;


Route::get('/', [FoodController::class, 'getLanding']);

// Cart
// Route::get('/cart', [PageController::class, 'cart']);
Route::get('/cart', [CartController::class, 'cartView']);
Route::get('/add-cart/{id}', [CartController::class, 'addFood']);


Route::get('/kos/AC', [KosController::class, 'getKamarAC']);
Route::get('/kos/Non-AC', [KosController::class, 'getKamarNonAC']);
Route::get('/kos-detail/{id}', [KosController::class, 'getKamarDetail']);
Route::get('/kos-invoice', function () {
    return view('kos-invoice');
});


Route::get('/food', [FoodController::class, 'getFood']);
Route::get('/food-payment', function () {
    return view('food-payment');
});


Route::get('/user', [PageController::class, 'dashboard']);

Route::get('/user/history/kamar', [PageController::class, 'user_history'])->name('search-history');
Route::get('/user/history/kamar/{id}', [PageController::class, 'user_history_detail']);
Route::get('/user/history/food', [PageController::class, 'user_history_food'])->name('search-history-food');
Route::get('/user/history/food/{id}', [PageController::class, 'user_history_detail_food']);



Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');

Route::get('/admin', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
	Route::get('/hlmnTenant', [HomeController::class, 'showtenant'])->name('showtenant')->middleware('auth');
	Route::get('/reportTenant', [HomeController::class, 'showReportTenant'])->name('showReportTenant')->middleware('auth');
	Route::get('/ordersTenant', [HomeController::class, 'showOrders'])->name('showOrders')->middleware('auth');
	Route::post('/insertmenu', [MenuController::class, 'insertmenu'])->name('insertmenu');
	Route::get('/edit-menu/{id}', [MenuControlπler::class, 'showEditMenu'])->name('edit.menu');
	Route::post('/update-status-menu/{id}', [MenuController::class, 'updateStatusMenu'])->name('updateStatus.menu');
	Route::put('/update-menu/{id}', [MenuController::class, 'updateMenu'])->name('update.menu');
Route::post('/update-status-menu/{id}', [MenuController::class, 'updateStatusMenu'])->name('updateStatus.menu');Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/profileTenant', [PageController::class, 'profileTenant'])->name('profileTenant');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


