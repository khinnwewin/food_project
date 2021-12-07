<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DishController;
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

Route::get('/', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('order.form');
Route::post('order_submit', [App\Http\Controllers\Admin\OrderController::class, 'submit'])->name('order.submit');



Auth::routes();
Route::resource('dish',App\Http\Controllers\Admin\DishController::class);
Route::get('order',[App\Http\Controllers\Admin\DishController::class,'order'])->name('kitchen.order');
Route::get('order/{order}/approve',[App\Http\Controllers\Admin\DishController::class,'approve']);
Route::get('order/{order}/cancel',[App\Http\Controllers\Admin\DishController::class,'cancel']);
Route::get('order/{order}/ready',[App\Http\Controllers\Admin\DishController::class,'ready']);
Route::get('order/{order}/serve',[App\Http\Controllers\Admin\OrderController::class,'serve']);







