<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Security\DashboardController;
use App\Http\Controllers\Security\AuthController;
use App\Http\Controllers\Security\UserRegisterController;

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
Route::prefix('security')->group(function () {
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('security.changePassword');
    Route::patch('/update-password', [AuthController::class, 'updatePassword'])->name('security.updatePassword');
    Route::get('/home', [DashboardController::class, 'index'])->name('security.home.index');

    Route::prefix('user-register')->group(function () {
        Route::get('/', [UserRegisterController::class, 'index'])->name('security.user-register.index');
        Route::get('/create', [UserRegisterController::class, 'create'])->name('security.user-register.create');
        Route::get('/detail/{id}', [UserRegisterController::class, 'detail'])->name('security.user-register.detail');
        Route::post('/store', [UserRegisterController::class, 'store'])->name('security.user-register.store');
        Route::patch('/approve/{id}', [UserRegisterController::class, 'approve'])->name('security.user-register.approve');
        Route::get('/reschedule/{id}', [UserRegisterController::class, 'reschedule'])->name('security.user-register.reschedule');
        Route::patch('/reschedule/{id}', [UserRegisterController::class, 'updateReschedule'])->name('security.user-register.updateReschedule');
        Route::get('/edit', [UserRegisterController::class, 'edit'])->name('security.user-register.edit');
        Route::get('/qrcode/{uuid}', [UserRegisterController::class, 'qrcode'])->name('security.user-register.qrcode');
    });
    
});