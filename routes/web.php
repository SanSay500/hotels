<?php

use App\Models\Offer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffersController;
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
Route::get('/card', function () {
    return view('card');
});

Route::get('/',[OffersController::class, 'index'])->name('index');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/add', [App\Http\Controllers\HomeController::class, 'showAddOfferForm'])->name('offer.add');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'storeOffer'])->name('offer.store');
Route::get('/home/{offer}/edit', [App\Http\Controllers\HomeController::class, 'showEditOfferForm'])->name('offer.editForm')->middleware('can:update,offer');
Route::patch('/home/{offer}', [App\Http\Controllers\HomeController::class, 'updateOffer'])->name('offer.update')->middleware('can:update,offer');
Route::delete('/home/{offer}', [App\Http\Controllers\HomeController::class, 'deleteOffer'])->name('offer.destroy')->middleware('can:delete,offer');
Route::get('/{offer}',[OffersController::class,'detail'])->name('detail');
Route::get('/home/{offer}/delete', [App\Http\Controllers\HomeController::class, 'showDeleteOfferForm'])->name('offer.deleteForm')->middleware('can:delete,offer');



