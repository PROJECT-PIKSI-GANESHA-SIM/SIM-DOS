<?php

use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\PengajaranController;
use App\Http\Controllers\ProfileController;
use App\Models\Pengabdian;
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
    return view('home', [
        "title" => "Beranda"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "Tentang"
    ]);
});

Route::get('/dosen', function () {
    return view('dosen', [
        "title" => "Dosen"
    ]);
});

Route::get('/detaildosen', function () {
    return view('dosen', [
        "title" => "Detail Dosen"
    ]);
});

Route::get('/informationcenter', function () {
    return view('informationcenter', [
        "title" => "Pusat Informasi"
    ]);
});

Route::get('/detail_informationcenter', function () {
    // return view('detail_informationcenter');
    return view('detail_informationcenter', [
        "title" => "Pusat Informasi"
    ]);
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

    Route::get('/data_diri/identitas/{id}/edit', [DataDiriController::class, 'edit_identitas'])->name('identitas.edit');
    Route::get('/data_diri/alamat_kontak/{id}/edit', [DataDiriController::class, 'edit_alamat_kontak'])->name('alamat_kontak.edit');
    Route::get('/data_diri/kepegawaian/{id}/edit', [DataDiriController::class, 'edit_kepegawaian'])->name('kepegawaian.edit');
    Route::get('/data_diri/lain/{id}/edit', [DataDiriController::class, 'edit_lain'])->name('lain.edit');

    Route::put('/data_diri/identitas/update/{id}', [DataDiriController::class, 'update_identitas'])->name('identitas.update');
    Route::put('/data_diri/lain/update/{id}', [DataDiriController::class, 'update_lain'])->name('lain.update');
    Route::put('/data_diri/alamat_kontak/update/{id}', [DataDiriController::class, 'update_alamat_kontak'])->name('alamat_kontak.update');
    Route::put('/data_diri/kepegawaian/update/{id}', [DataDiriController::class, 'update_kepegawaian'])->name('kepegawaian.update');

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
    Route::get('/penelitian/create', [PenelitianController::class, 'create'])->name('penelitian.create');
    Route::post('/penelitian/create', [PenelitianController::class, 'store'])->name('penelitian.store');
    Route::get('/penelitian/{id}/edit', [PenelitianController::class, 'edit'])->name('penelitian.edit');
    Route::put('/penelitian/update/{id}', [PenelitianController::class, 'update'])->name('penelitian.update');
    Route::delete('/penelitian/delete/{id}', [PenelitianController::class, 'destroy'])->name('penelitian.destroy');


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
    Route::post('/pengabdian/create', [PengabdianController::class, 'store'])->name('pengabdian.store');
    Route::get('/pengabdian/{id}/edit', [PengabdianController::class, 'edit'])->name('pengabdian.edit');
    Route::put('/pengabdian/update/{id}', [PengabdianController::class, 'update'])->name('pengabdian.update');
    Route::delete('/pengabdian/delete/{id}', [PengabdianController::class, 'destroy'])->name('pengabdian.destroy');
});
