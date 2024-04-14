<?php

use App\Http\Controllers\BallBucketAssignmentController;
use App\Http\Controllers\BallStoreController;
use App\Http\Controllers\BucketStoreController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');

Route::post('buckets/store', BucketStoreController::class)->name('buckets.store');
Route::post('balls/store', BallStoreController::class)->name('balls.store');
Route::post('ball-bucket-assignment', BallBucketAssignmentController::class)->name('ball-bucket-assignment');
