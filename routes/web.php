<?php

use App\Http\Controllers\ListingController;
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


Route::get('/list/create',[ListingController::class,'create']);
Route::post('/list',[ListingController::class,'store']);
Route::get('/list/{listing}',[ListingController::class,'show']);