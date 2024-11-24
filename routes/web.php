<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Route::get('/', [HomeController::class, 'index'])->name('login')->middleware('guest');
Route::get('/qrcode/{uuid}', [HomeController::class, 'qrcode'])->name('qrcode');
Route::post('/login', [HomeController::class, 'login'])->name('auth')->middleware('guest');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
require_once('user/web.php');
require_once('admin/web.php');
require_once('supervisor/web.php');
require_once('manager/web.php');
require_once('security/web.php');