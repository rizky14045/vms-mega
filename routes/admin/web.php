<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ListWorkController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Admin\UserRegisterController;
use App\Http\Controllers\Admin\PraqualificationController;

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
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('admin.login');
    Route::get('/home', [DashboardController::class, 'index'])->name('admin.home.index');
    Route::get('/faq', [FaqController::class, 'index'])->name('admin.faq.index');
    
    Route::prefix('user-register')->group(function () {
        Route::get('/', [UserRegisterController::class, 'index'])->name('admin.user-register.index');
        Route::get('/create', [UserRegisterController::class, 'create'])->name('admin.user-register.create');
        Route::get('/detail/{id}', [UserRegisterController::class, 'detail'])->name('admin.user-register.detail');
        Route::post('/store', [UserRegisterController::class, 'store'])->name('admin.user-register.store');
        Route::patch('/approve/{id}', [UserRegisterController::class, 'approve'])->name('admin.user-register.approve');
        Route::get('/edit', [UserRegisterController::class, 'edit'])->name('admin.user-register.edit');
        Route::get('/qrcode/{uuid}', [UserRegisterController::class, 'qrcode'])->name('admin.user-register.qrcode');
    });
    
});