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
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\TenantController;

Route::get('/', [FoodController::class, 'getLanding']);

// Cart
Route::get('/cart', [CartController::class, 'cartView']);
Route::get('/add-cart/{id}', [CartController::class, 'addFood']);
Route::get('/payCart', [CartController::class, 'paymentCart']);


Route::get('/kos/AC', [KosController::class, 'getKamarAC']);
Route::get('/kos/Non-AC', [KosController::class, 'getKamarNonAC']);
Route::get('/kos-detail/{id}', [KosController::class, 'getKamarDetail']);
Route::get('/kos-invoice', function () {
    return view('kos-invoice');
});


Route::get('/food', [FoodController::class, 'getFood']);
// Route::get('/food-payment', function () {
//     return view('food-payment');
// });
Route::get('/pay-food/{id}', [FoodController::class, 'foodPayment']);



Route::get('/user', [PageController::class, 'dashboard'])->name('user');

Route::get('/user/history/kamar', [PageController::class, 'user_history'])->name('search-history');
Route::get('/user/history/kamar/{id}', [PageController::class, 'user_history_detail']);
Route::get('/user/history/food', [PageController::class, 'user_history_food'])->name('search-history-food');
Route::get('/user/history/food/{id}', [PageController::class, 'user_history_detail_food']);

Route::post('/payment', [MidtransController::class, 'payment'])->name('payment');
Route::get('/payment/success', [MidtransController::class, 'payment_success']);
Route::get('/payment/failed', [MidtransController::class, 'payment_fail']);
// Route::post('/payment-notif', [MidtransController::class, 'payment_notif'])->name('payment-notif');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); //Ini tolong jangan dipindah, aku tahu double. Tp kalo nggak ada ini, gamau jalan logout di user.
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
	Route::post('/orders/filter', [HomeController::class, 'filter'])->name('orders.filter')->middleware('auth');
	Route::post('/orders/terima/{id}', [HomeController::class, 'terimaOrder'])->name('orders.terima');
	Route::post('/orders/tolak/{id}', [HomeController::class, 'tolakOrder'])->name('orders.tolak');
	Route::get('/pengeluaran', [HomeController::class, 'showPengeluaran'])->name('pengeluaran.show');
	Route::post('/pengeluaran/store', [HomeController::class, 'storePengeluaran'])->name('pengeluaran.store');
	Route::post('/report/tenant', [HomeController::class, 'showReportTenant'])->name('report.tenant');
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
	Route::put('/update', [PageController::class, 'update'])->name('profile.update');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	Route::post('addTenant', [TenantController::class, 'addTenant'])->name('add-tenant');
	Route::post('editTenant', [TenantController::class, 'changeTenant'])->name('edit-tenant');
	Route::get('/tenant/edit/{id}', [TenantController::class, 'editTenant'])->name('editTenant');
	Route::get('/tenant/delete/{id}', [TenantController::class, 'deleteTenant']);

	Route::post('addKos', [KosController::class, 'addKos'])->name('add-kos');
	Route::post('editKos', [KosController::class, 'changeKos'])->name('edit-kos');
	Route::get('/kos/edit/{id}', [KosController::class, 'editKos'])->name('editKos');
	Route::get('/kos/delete/{id}', [KosController::class, 'deleteKos']);
	Route::get('/user-management/delete/{id}', [UserProfileController::class, 'deleteUser']);
});


