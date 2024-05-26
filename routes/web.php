<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\custom_auth_controller;
use App\Http\Controllers\Admin\AdminController;


use App\Http\Controllers\Admin\logoutController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProductCon;
use App\Http\Controllers\ReservationCon;
use App\Http\Controllers\UsersCon;
use App\Http\Controllers\ReservationFrontCon;
use App\Models\User;

Route::get('/',[custom_auth_controller::class,'dashboard'])->name('dashboard');
Route::get('/login',[custom_auth_controller::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration',[custom_auth_controller::class,'registration']);
Route::post('/register-user',[custom_auth_controller::class,'registerUser'])->name('register-user');
Route::post('/login-user',[custom_auth_controller::class,'loginUser'])->name('login-user');
Route::get('/logout',[custom_auth_controller::class,'logout']);


Route::get('/appoint',[AppointmentController::class,'index'])->middleware('isLogedIn');
Route::get('/stores',[AppointmentController::class,'stores']);
Route::post('/appointed',[AppointmentController::class,'appointed'])->name('appointed');




Route::get('/admin',[AdminController::class,'index'])->middleware('admin');
Route::get('/reservation',[ReservationCon::class,'index'])->middleware('admin')->name('reservation');
Route::get('/reservation/{reservation}/edit',[ReservationCon::class,'edit'])->middleware('admin')->name('reservation.edit');
Route::put('/reservation/{reservation}',[ReservationCon::class,'update'])->middleware('admin')->name('reservation.update');
Route::put('/reservation-destroy/{reservation}',[ReservationCon::class,'destroy'])->middleware('admin')->name('reservation-destroy');

Route::get('/users',[UsersCon::class,'index'])->middleware('admin')->name('users');
Route::get('/users/{user}/edit',[UsersCon::class,'edit'])->middleware('admin')->name('users.edit');
Route::put('/users/{user}',[UsersCon::class,'update'])->middleware('admin')->name('users.update');
Route::put('/users-destroy/{user}',[UsersCon::class,'destroy'])->middleware('admin')->name('users-destroy');

Route::get('/products',[ProductCon::class,'index'])->middleware('admin')->name('products');
Route::get('/products/create',[ProductCon::class,'create'])->middleware('admin')->name('products/create');


