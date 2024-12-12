<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\CheckRole;


App::make('router')->aliasMiddleware('role', \App\Http\Middleware\CheckRole::class);

Route::get('/', [HomeController::class,'main']);
Route::get('/main',[HomeController::class, 'index'])->name('main');
Route::get('rooms', [HomeController::class,'rooms'])->name('rooms');
Route::get('contacts', [HomeController::class,'contacts'])->name('contacts');
Route::get('reviews', [ReviewController::class,'reviews'])->name('reviews');


Route::middleware(['auth'])->group(function(){

    Route::middleware(['role:user'])->group(function(){
        Route::get('/book-room/{id}', [ReservationController::class,'bookRoom'])->name('book-room');
        Route::post('/make-reservation/{id}', [ReservationController::class,'makeReservation'])->name('make-reservation');
        Route::get('my-reservations', [ReservationController::class,'myReservations'])->name('my-reservations');
        Route::delete('/delete-reservation/{id}', [ReservationController::class,'deleteReservation'])->name('delete-reservation');
        Route::post('/create-review', [ReviewController::class,'createReview'])->name('create-review');
        Route::get('reservation-details/{id}', [ReservationController::class,'details'])->name('reservation-details');
    });


Route::middleware(['role:admin'])->group(function(){
Route::get('/create-room', [AdminController::class,'createRoom'])->name('create-room');
Route::post('/add-room', [AdminController::class,'addRoom'])->name('add-room');
Route::get('/show-room', [AdminController::class,'showRoom'])->name('show-room');
Route::delete('/delete-room/{id}', [AdminController::class,'deleteRoom'])->name('delete-room');
Route::get('/edit-room/{id}', [AdminController::class,'editRoom'])->name('edit-room');
Route::put('/update-room/{id}', [AdminController::class,'updateRoom'])->name('update-room');
Route::get('reservations',[AdminController::class,'reservations'])->name('reservations');
Route::put('/update-status/{id}', [AdminController::class,'updateStatus'])->name('update-status');
Route::get('user-reviews', [AdminController::class,'userReviews'])->name('user-reviews');
Route::delete('/delete-review/{id}', [AdminController::class,'deleteReview'])->name('delete-review');
});
});





