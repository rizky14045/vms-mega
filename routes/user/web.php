<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\FaqController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\ListWorkController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\EvaluationController;
use App\Http\Controllers\User\PraqualificationController;

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
Route::get('/', [HomeUserController::class, 'index'])->name('user.index');
Route::get('/detail/{uuid}', [HomeUserController::class, 'detail'])->name('user.detail');
Route::post('/store', [HomeUserController::class, 'store'])->name('user.store');