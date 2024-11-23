<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Manager\DashboardController;
use App\Http\Controllers\Manager\AuthController;
use App\Http\Controllers\Manager\UserRegisterController;

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
Route::prefix('manager')->group(function () {
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('manager.changePassword');
    Route::patch('/update-password', [AuthController::class, 'updatePassword'])->name('manager.updatePassword');
    Route::get('/home', [DashboardController::class, 'index'])->name('manager.home.index');

    Route::prefix('user-register')->group(function () {
        Route::get('/', [UserRegisterController::class, 'index'])->name('manager.user-register.index');
        Route::get('/create', [UserRegisterController::class, 'create'])->name('manager.user-register.create');
        Route::get('/detail/{id}', [UserRegisterController::class, 'detail'])->name('manager.user-register.detail');
        Route::post('/store', [UserRegisterController::class, 'store'])->name('manager.user-register.store');
        Route::patch('/approve/{id}', [UserRegisterController::class, 'approve'])->name('manager.user-register.approve');
        Route::get('/reschedule/{id}', [UserRegisterController::class, 'reschedule'])->name('manager.user-register.reschedule');
        Route::patch('/reschedule/{id}', [UserRegisterController::class, 'updateReschedule'])->name('manager.user-register.updateReschedule');
        Route::get('/edit', [UserRegisterController::class, 'edit'])->name('manager.user-register.edit');
        Route::get('/qrcode/{uuid}', [UserRegisterController::class, 'qrcode'])->name('manager.user-register.qrcode');
    });
    
});