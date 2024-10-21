<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;



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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('rooms', RoomController::class);

Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('room.details');

route::resource('book', ReservationController::class);

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/profile', [ProfileController::class, 'showProfileForm'])->name('profile.edit');

Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


