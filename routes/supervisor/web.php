<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Supervisor\DashboardController;
use App\Http\Controllers\Supervisor\AuthController;
use App\Http\Controllers\Supervisor\UserRegisterController;

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
Route::prefix('supervisor')->group(function () {
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('supervisor.changePassword');
    Route::patch('/update-password', [AuthController::class, 'updatePassword'])->name('supervisor.updatePassword');
    Route::get('/home', [DashboardController::class, 'index'])->name('supervisor.home.index');

    Route::prefix('user-register')->group(function () {
        Route::get('/', [UserRegisterController::class, 'index'])->name('supervisor.user-register.index');
        Route::get('/create', [UserRegisterController::class, 'create'])->name('supervisor.user-register.create');
        Route::get('/detail/{id}', [UserRegisterController::class, 'detail'])->name('supervisor.user-register.detail');
        Route::post('/store', [UserRegisterController::class, 'store'])->name('supervisor.user-register.store');
        Route::patch('/approve/{id}', [UserRegisterController::class, 'approve'])->name('supervisor.user-register.approve');
        Route::get('/reschedule/{id}', [UserRegisterController::class, 'reschedule'])->name('supervisor.user-register.reschedule');
        Route::patch('/reschedule/{id}', [UserRegisterController::class, 'updateReschedule'])->name('supervisor.user-register.updateReschedule');
        Route::get('/edit', [UserRegisterController::class, 'edit'])->name('supervisor.user-register.edit');
        Route::get('/qrcode/{uuid}', [UserRegisterController::class, 'qrcode'])->name('supervisor.user-register.qrcode');
    });
    
});