<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
Route::get('/bookRoom/{id}', [HomeController::class,'bookRoom'])->name('bookRoom');
Route::post('/makeReservation/{id}', [HomeController::class,'makeReservation'])->name('makeReservation');