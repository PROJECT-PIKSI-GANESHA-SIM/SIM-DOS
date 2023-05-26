<?php

use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajaranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    // 'register' => false
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['web', 'auth']], function () {
    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Data Diri
    Route::get('/data_diri', [DataDiriController::class, 'index'])->name('data_diri');
    // Pengajaran
    Route::get('/pengajaran', [PengajaranController::class, 'index'])->name('pengajaran');
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});