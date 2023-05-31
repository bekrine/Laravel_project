<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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

Route::get('/', [ListingController::class,'index']);

Route::post('/list',[ListingController::class,'store'])->middleware('auth');

Route::get('/list/create',[ListingController::class,'create'])->middleware('auth');

Route::get('/list/manage',[ListingController::class,'manage'])->middleware('auth');

Route::get('/list/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

Route::put('/list/{listing}',[ListingController::class,'update'])->middleware('auth');

Route::delete('/list/{listing}',[ListingController::class,'destroy'])->middleware('auth');

Route::get('/list/{listing}',[ListingController::class,'show']);


//user


Route::get('/register',[UserController::class,'create'])->middleware('guest');
Route::get('/login',[UserController::class,'show'])->name('login')->middleware('guest');
Route::post('/users',[UserController::class,'store']);
Route::get('/logout',[UserController::class,'logout'])->middleware('auth');
Route::post('/users/authenticate',[UserController::class,'authenticate']);