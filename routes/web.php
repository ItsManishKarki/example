<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/property', [FrontendController::class, 'property'])->name('property');
Route::get('/property/{id}', [FrontendController::class, 'propertyDetail'])->name('property.detail');
Route::get('/my-property',[FrontendController::class,'myProperty'])->name('my.property');
Route::get('/my-property/edit/{id}',[FrontendController::class,'editMyProperty'])->name('edit.myproperty');
Route::post('/my-property/edit/{id}',[FrontendController::class,'updateMyProperty'])->name('update.myproperty');
Route::get('/propery-filter',[FrontendController::class,'filterProperty']);
Route::get('/booking-property/{id}',[FrontendController::class,'bookProperty'])->name('booking.property');
Route::post('/booking-property/store/{id}',[BookingController::class,'bookPropertyStore'])->name('booking.property.store');
Route::get('/my-booking',[BookingController::class,'myBooking'])->name('my.booking');
Route::get('/aprove/{id}',[BookingController::class,'aprove'])->name('aprove');
Route::get('/reject/{id}',[BookingController::class,'reject'])->name('reject');
Route::get('/scan-qr-code/qr/{id}',[BookingController::class,'scanQr'])->name('scan.qr');
Route::post('/search',[FrontendController::class,'search'])->name('search');

Route::prefix('user')->middleware('auth')->group(function () {
//Property
    Route::get('/property', [PropertyController::class, 'user'])->name('property.user');
    Route::post('/property', [PropertyController::class, 'store'])->name('property.store');

});

Route::prefix('admin')->middleware('role')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');

    Route::get('/users',[HomeController::class,'users'])->name('user');
    Route::get('/users/edit/{id}',[HomeController::class,'editUsers'])->name('user.edit');
    Route::post('/users/edit/{id}',[HomeController::class,'updateUsers'])->name('user.update');
    Route::get('/users/delete/{id}',[HomeController::class,'deleteUsers'])->name('user.delete');

    Route::get('/properties',[PropertyController::class,'index'])->name('property.index');
    Route::get('/booking',[BookingController::class,'index'])->name('booking');

});
