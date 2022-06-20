<?php

use App\Models\Offer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffersController;
use Illuminate\Support\Facades\Auth;
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
//EXAMPLES AND TESTS
Route::get('/card', function () {
    return view('livewire.counter');
});
Route::view('/powergrid', 'powergrid-demo');


//AUTH CONTROLLERS
Auth::routes(['verify' => true]);
Auth::routes();
Route::get('/password', [\App\Http\Controllers\Auth\PasswordController::class,'index'])->name('password.custom');
Route::post('/password/login', [\App\Http\Controllers\Auth\PasswordController::class,'customLogin'])->name('custom.login');
Route::post('/login/check', [\App\Http\Controllers\Auth\LoginController::class,'check_email'])->name('check_email');
Route::get('/register/enter', [\App\Http\Controllers\Auth\RegisterController::class,'index'])->name('register.enter');

//HOTELS
Route::post('/hotel/add', [\App\Http\Controllers\HotelController::class,'store'])->name('hotel.add.store');
Route::get('/hotel/add/{city_name}', [\App\Http\Controllers\HotelController::class,'index'])->name('hotel.add');

//FEEDBACK
Route::post('/feedback', [\App\Http\Controllers\FeedbackController::class, 'sendQuestion'])->name('feedback.send');
Route::get('/feedback', [\App\Http\Controllers\FeedbackController::class, 'showFeedbackForm'])->name('feedback.form');

//USERS
Route::patch('/profile/{user}', [App\Http\Controllers\UserController::class, 'updateUser'])->name('profile.update')->middleware(['auth','can:update,user']);
Route::get('/profile', [App\Http\Controllers\UserController::class, 'showUserForm'])->name('user.profile');
Route::get('/profile/{user}/edit', [App\Http\Controllers\UserController::class, 'editUserForm'])->name('user.profile.edit')->middleware('can:update,user');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//OFFERS
Route::get('/',[OffersController::class, 'index'])->name('index');
Route::get('/{offer}',[OffersController::class,'detail'])->name('detail');
Route::get('/home/{offer}/edit', [App\Http\Controllers\HomeController::class, 'showEditOfferForm'])->name('offer.editForm')->middleware('can:update,offer');
Route::patch('/home/{offer}', [App\Http\Controllers\HomeController::class, 'updateOffer'])->name('offer.update')->middleware('can:update,offer');
Route::get('/home/add', [App\Http\Controllers\HomeController::class, 'showAddOfferForm'])->name('offer.add');
Route::get('/home/{offer}/delete', [App\Http\Controllers\HomeController::class, 'showDeleteOfferForm'])->name('offer.deleteForm')->middleware('can:delete,offer');
Route::delete('/home/{offer}', [App\Http\Controllers\HomeController::class, 'deleteOffer'])->name('offer.destroy')->middleware('can:delete,offer');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'storeOffer'])->name('offer.store')->middleware('verified');

//ORDERS
Route::get('/reserve/{offer}', [App\Http\Controllers\OffersController::class, 'showReserveForm'])->name('reserveOffer.form')->middleware('verified');
Route::patch('/home/reserve/{offer}', [App\Http\Controllers\OffersController::class, 'makeReserve'])->name('offer.reserve');
Route::get('/home/history', [App\Http\Controllers\OrderController::class, 'history'])->name('order.history')->middleware('auth');

