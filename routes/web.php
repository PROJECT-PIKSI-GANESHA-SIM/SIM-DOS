<?php

use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
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
    Route::get('/pengajaran/create', [PengajaranController::class, 'create'])->name('pengajaran.create');
    Route::post('/pengajaran/create', [PengajaranController::class, 'store'])->name('pengajaran.store');
    Route::get('/pengajaran/{id}/edit', [PengajaranController::class, 'edit'])->name('pengajaran.edit');
    Route::put('/pengajaran/update/{id}', [PengajaranController::class, 'update'])->name('pengajaran.update');
    Route::delete('/pengajaran/delete/{id}', [PengajaranController::class, 'destroy'])->name('pengajaran.destroy');
    
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    // Route::resources('/profile', ProfileController::class);
    
    // Penelitian
    Route::get('/penelitian', [PenelitianController::class, 'index'])->name('penelitian');

    // Pendidikan
    Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan');
    Route::get('/pendidikan/create', [PendidikanController::class, 'create'])->name('pendidikan.create');
    Route::post('/pendidikan/create', [PendidikanController::class, 'store'])->name('pendidikan.store');
    Route::get('/pendidikan/{id}/edit', [PendidikanController::class, 'edit'])->name('pendidikan.edit');
    Route::put('/pendidikan/update/{id}', [PendidikanController::class, 'update'])->name('pendidikan.update');
    Route::delete('/pendidikan/delete/{id}', [PendidikanController::class, 'destroy'])->name('pendidikan.destroy');

    // Pengabdian
    Route::get('/pengabdian', [PengabdianController::class, 'index'])->name('pengabdian');
    Route::get('/pengabdian/create', [PengabdianController::class, 'create'])->name('pengabdian.create');
});