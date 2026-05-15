<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;

require __DIR__.'/auth.php';

/*
|--------------------------------
| PUBLIC
|--------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------
| USER & ADMIN (HARUS LOGIN)
|--------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // BOOKING (USER & ADMIN)
    Route::resource('bookings', BookingController::class);
});

/*
|--------------------------------
| ADMIN ONLY
|--------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('fields', FieldController::class);

});