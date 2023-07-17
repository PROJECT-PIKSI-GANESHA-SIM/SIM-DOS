<?php

use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\PengajaranController;
use App\Http\Controllers\ProfileController;
use App\Models\Pengabdian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


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
    Route::get('/home', [HomeController::class, 'index'])->middleware('role:dosen|akademik')->name('home');
    
    // Data Diri
    Route::get('/data_diri', [DataDiriController::class, 'index'])->middleware('role|dosen')->name('data_diri');

    Route::get('/data_diri/identitas/{id}/edit', [DataDiriController::class, 'edit_identitas'])->middleware('role:dosen')->name('identitas.edit');
    Route::get('/data_diri/alamat_kontak/{id}/edit', [DataDiriController::class, 'edit_alamat_kontak'])->middleware('role:dosen')->name('alamat_kontak.edit');
    Route::get('/data_diri/kepegawaian/{id}/edit', [DataDiriController::class, 'edit_kepegawaian'])->middleware('role:dosen')->name('kepegawaian.edit');
    Route::get('/data_diri/lain/{id}/edit', [DataDiriController::class, 'edit_lain'])->middleware('role:dosen')->name('lain.edit');
    
    Route::put('/data_diri/identitas/update/{id}', [DataDiriController::class, 'update_identitas'])->middleware('role:dosen')->name('identitas.update');
    Route::put('/data_diri/lain/update/{id}', [DataDiriController::class, 'update_lain'])->middleware('role:dosen')->name('lain.update');
    Route::put('/data_diri/alamat_kontak/update/{id}', [DataDiriController::class, 'update_alamat_kontak'])->middleware('role:dosen')->name('alamat_kontak.update');
    Route::put('/data_diri/kepegawaian/update/{id}', [DataDiriController::class, 'update_kepegawaian'])->middleware('role:dosen')->name('kepegawaian.update');

    // Pengajaran
    Route::get('/pengajaran', [PengajaranController::class, 'index'])->middleware('role:dosen')->name('pengajaran');
    Route::get('/pengajaran/create', [PengajaranController::class, 'create'])->middleware('role:dosen')->name('pengajaran.create');
    Route::post('/pengajaran/create', [PengajaranController::class, 'store'])->middleware('role:dosen')->name('pengajaran.store');
    Route::get('/pengajaran/{id}/edit', [PengajaranController::class, 'edit'])->middleware('role:dosen')->name('pengajaran.edit');
    Route::put('/pengajaran/update/{id}', [PengajaranController::class, 'update'])->middleware('role:dosen')->name('pengajaran.update');
    Route::delete('/pengajaran/delete/{id}', [PengajaranController::class, 'destroy'])->middleware('role:dosen')->name('pengajaran.destroy');
    
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->middleware('role:dosen|akademik')->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->middleware('role:dosen|akademik')->name('profile.update');
    // Route::resources('/profile', ProfileController::class);
    
    // Penelitian
    Route::get('/penelitian', [PenelitianController::class, 'index'])->middleware('role:dosen')->name('penelitian');
    Route::get('/penelitian/create', [PenelitianController::class, 'create'])->middleware('role:dosen')->name('penelitian.create');
    Route::post('/penelitian/create', [PenelitianController::class, 'store'])->middleware('role:dosen')->name('penelitian.store');
    Route::get('/penelitian/{id}/edit', [PenelitianController::class, 'edit'])->middleware('role:dosen')->name('penelitian.edit');
    Route::put('/penelitian/update/{id}', [PenelitianController::class, 'update'])->middleware('role:dosen')->name('penelitian.update');
    Route::delete('/penelitian/delete/{id}', [PenelitianController::class, 'destroy'])->middleware('role:dosen')->name('penelitian.destroy');
    
    
    // Pendidikan
    Route::get('/pendidikan', [PendidikanController::class, 'index'])->middleware('role:dosen')->name('pendidikan');
    Route::get('/pendidikan/create', [PendidikanController::class, 'create'])->middleware('role:dosen')->name('pendidikan.create');
    Route::post('/pendidikan/create', [PendidikanController::class, 'store'])->middleware('role:dosen')->name('pendidikan.store');
    Route::get('/pendidikan/{id}/edit', [PendidikanController::class, 'edit'])->middleware('role:dosen')->name('pendidikan.edit');
    Route::put('/pendidikan/update/{id}', [PendidikanController::class, 'update'])->middleware('role:dosen')->name('pendidikan.update');
    Route::delete('/pendidikan/delete/{id}', [PendidikanController::class, 'destroy'])->middleware('role:dosen')->name('pendidikan.destroy');
    
    // Pengabdian
    Route::get('/pengabdian', [PengabdianController::class, 'index'])->middleware('role:dosen')->name('pengabdian');
    Route::get('/pengabdian/create', [PengabdianController::class, 'create'])->middleware('role:dosen')->name('pengabdian.create');
    Route::post('/pengabdian/create', [PengabdianController::class, 'store'])->middleware('role:dosen')->name('pengabdian.store');
    Route::get('/pengabdian/{id}/edit', [PengabdianController::class, 'edit'])->middleware('role:dosen')->name('pengabdian.edit');
    Route::put('/pengabdian/update/{id}', [PengabdianController::class, 'update'])->middleware('role:dosen')->name('pengabdian.update');
    Route::delete('/pengabdian/delete/{id}', [PengabdianController::class, 'destroy'])->middleware('role:dosen')->name('pengabdian.destroy');
    
    // ROLE AKADEMIK
    Route::get('/dosen', [DosenController::class, 'index'])->middleware('role:akademik')->name('dosen');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->middleware('role:akademik')->name('dosen.edit');
    
    // Pendidikan
    Route::get('/dosen/{id}/pendidikan/create', [DosenController::class, 'create_pendidikan'])->middleware('role:akademik')->name('dosen.pendidikan.create');
    Route::post('/dosen/{id}/pendidikan/create', [DosenController::class, 'store_pendidikan'])->middleware('role:akademik')->name('dosen.pendidikan.store');
    Route::get('/dosen/{id}/pendidikan/edit', [DosenController::class, 'edit_pendidikan'])->middleware('role:akademik')->name('dosen.pendidikan.edit');
    Route::delete('/dosen/pendidikan/delete/{id}', [DosenController::class, 'destroy_pendidikan'])->middleware('role:akademik')->name('dosen.pendidikan.destroy');
    
    // Pengajaran
    Route::get('/dosen/{id}/pengajaran/create', [DosenController::class, 'create_pengajaran'])->middleware('role:akademik')->name('dosen.pengajaran.create');
    Route::post('/dosen/{id}/pengajaran/create', [DosenController::class, 'store_pengajaran'])->middleware('role:akademik')->name('dosen.pengajaran.store');
    Route::get('/dosen/{id}/pengajaran/edit', [DosenController::class, 'edit_pengajaran'])->middleware('role:akademik')->name('dosen.pengajaran.edit');
    Route::delete('/dosen/pengajaran/delete/{id}', [DosenController::class, 'destroy_pengajaran'])->middleware('role:akademik')->name('dosen.pengajaran.destroy');
    
    // Penelitian
    Route::get('/dosen/{id}/penelitian/create', [DosenController::class, 'create_penelitian'])->middleware('role:akademik')->name('dosen.penelitian.create');
    Route::post('/dosen/{id}/penelitian/create', [DosenController::class, 'store_penelitian'])->middleware('role:akademik')->name('dosen.penelitian.store');
    

});