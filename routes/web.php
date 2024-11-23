<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;

Route::get('/', [AdminController::class,'main']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/main',[AdminController::class, 'index'])->name('main');
Route::get('/createRoom', [AdminController::class,'createRoom'])->name('createRoom');
Route::post('/addRoom', [AdminController::class,'addRoom'])->name('addRoom');
Route::get('/showRoom', [AdminController::class,'showRoom'])->name('showRoom');
Route::delete('/deleteRoom/{id}', [AdminController::class,'deleteRoom'])->name('deleteRoom');
Route::get('/editRoom/{id}', [AdminController::class,'editRoom'])->name('editRoom');
Route::put('/updateRoom/{id}', [AdminController::class,'updateRoom'])->name('updateRoom');
Route::get('rooms', [AdminController::class,'rooms'])->name('rooms');
Route::get('/bookRoom/{id}', [ReservationController::class,'bookRoom'])->name('bookRoom');
Route::post('/makeReservation/{id}', [ReservationController::class,'makeReservation'])->name('makeReservation');
Route::get('reservations',[AdminController::class,'reservations'])->name('reservations');
Route::put('/updateStatus/{id}', [AdminController::class,'updateStatus'])->name('updateStatus');
Route::get('contacts', [HomeController::class,'contacts'])->name('contacts');
Route::get('myReservations', [ReservationController::class,'myReservations'])->name('myReservations');
Route::delete('/deleteReservation/{id}', [ReservationController::class,'deleteReservation'])->name('deleteReservation');
Route::get('reviews', [ReviewController::class,'reviews'])->name('reviews');
Route::post('/createReview', [ReviewController::class,'createReview'])->name('createReview');
Route::get('userReviews', [AdminController::class,'userReviews'])->name('userReviews');

