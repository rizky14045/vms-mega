<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ListWorkController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\BlockUserController;
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
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('admin.changePassword');
    Route::patch('/update-password', [AuthController::class, 'updatePassword'])->name('admin.updatePassword');
    Route::get('/home', [DashboardController::class, 'index'])->name('admin.home.index');
    Route::get('/report', [ReportController::class, 'index'])->name('admin.report.index');
    
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('admin.user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });
    Route::prefix('block-user')->group(function () {
        Route::get('/', [BlockUserController::class, 'index'])->name('admin.block-user.index');
        Route::get('/create', [BlockUserController::class, 'create'])->name('admin.block-user.create');
        Route::post('/store', [BlockUserController::class, 'store'])->name('admin.block-user.store');
        Route::get('/show/{id}', [BlockUserController::class, 'show'])->name('admin.block-user.show');
        Route::get('/edit/{id}', [BlockUserController::class, 'edit'])->name('admin.block-user.edit');
        Route::patch('/update/{id}', [BlockUserController::class, 'update'])->name('admin.block-user.update');
        Route::delete('/destroy/{id}', [BlockUserController::class, 'destroy'])->name('admin.block-user.destroy');
    });
    
    Route::prefix('tenant')->group(function () {
        Route::get('/', [TenantController::class, 'index'])->name('admin.tenant.index');
        Route::get('/create', [TenantController::class, 'create'])->name('admin.tenant.create');
        Route::post('/store', [TenantController::class, 'store'])->name('admin.tenant.store');
        Route::get('/show/{id}', [TenantController::class, 'show'])->name('admin.tenant.show');
        Route::get('/edit/{id}', [TenantController::class, 'edit'])->name('admin.tenant.edit');
        Route::patch('/update/{id}', [TenantController::class, 'update'])->name('admin.tenant.update');
        Route::delete('/destroy/{id}', [TenantController::class, 'destroy'])->name('admin.tenant.destroy');
    });

    Route::prefix('user-register')->group(function () {
        Route::get('/', [UserRegisterController::class, 'index'])->name('admin.user-register.index');
        Route::get('/create', [UserRegisterController::class, 'create'])->name('admin.user-register.create');
        Route::get('/detail/{id}', [UserRegisterController::class, 'detail'])->name('admin.user-register.detail');
        Route::post('/store', [UserRegisterController::class, 'store'])->name('admin.user-register.store');
        Route::patch('/approve/{id}', [UserRegisterController::class, 'approve'])->name('admin.user-register.approve');
        Route::get('/reschedule/{id}', [UserRegisterController::class, 'reschedule'])->name('admin.user-register.reschedule');
        Route::patch('/reschedule/{id}', [UserRegisterController::class, 'updateReschedule'])->name('admin.user-register.updateReschedule');
        Route::get('/edit', [UserRegisterController::class, 'edit'])->name('admin.user-register.edit');
        Route::get('/qrcode/{uuid}', [UserRegisterController::class, 'qrcode'])->name('admin.user-register.qrcode');
    });
    
});