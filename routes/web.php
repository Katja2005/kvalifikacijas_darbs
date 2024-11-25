<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\CheckRole;


App::make('router')->aliasMiddleware('role', CheckRole::class);

Route::get('/', [HomeController::class,'main']);
Route::get('/main',[HomeController::class, 'index'])->name('main');
Route::get('rooms', [HomeController::class,'rooms'])->name('rooms');
Route::get('contacts', [HomeController::class,'contacts'])->name('contacts');
Route::get('reviews', [ReviewController::class,'reviews'])->name('reviews');


Route::middleware(['auth'])->group(function(){

    Route::middleware(['role:user'])->group(function(){
        Route::get('/bookRoom/{id}', [ReservationController::class,'bookRoom'])->name('bookRoom');
        Route::post('/makeReservation/{id}', [ReservationController::class,'makeReservation'])->name('makeReservation');
        Route::get('myReservations', [ReservationController::class,'myReservations'])->name('myReservations');
        Route::delete('/deleteReservation/{id}', [ReservationController::class,'deleteReservation'])->name('deleteReservation');
        Route::post('/createReview', [ReviewController::class,'createReview'])->name('createReview');
    });


Route::middleware(['role:admin'])->group(function(){
Route::get('/createRoom', [AdminController::class,'createRoom'])->name('createRoom');
Route::post('/addRoom', [AdminController::class,'addRoom'])->name('addRoom');
Route::get('/showRoom', [AdminController::class,'showRoom'])->name('showRoom');
Route::delete('/deleteRoom/{id}', [AdminController::class,'deleteRoom'])->name('deleteRoom');
Route::get('/editRoom/{id}', [AdminController::class,'editRoom'])->name('editRoom');
Route::put('/updateRoom/{id}', [AdminController::class,'updateRoom'])->name('updateRoom');
Route::get('reservations',[AdminController::class,'reservations'])->name('reservations');
Route::put('/updateStatus/{id}', [AdminController::class,'updateStatus'])->name('updateStatus');
Route::get('userReviews', [AdminController::class,'userReviews'])->name('userReviews');
Route::delete('/deleteReview/{id}', [AdminController::class,'deleteReview'])->name('deleteReview');
});
});





