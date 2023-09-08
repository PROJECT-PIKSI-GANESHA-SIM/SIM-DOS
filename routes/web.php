<?php

use App\Http\Controllers\AllDosenController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\PengajaranController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\MenuPenunjangController;
use App\Http\Controllers\CapaianLuaranController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PusatInformasiController;
use App\Models\Pengabdian;
use App\Models\PusatInformasi;
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

    $pusat_informasi = PusatInformasi::where('status', 1)->orderBy('updated_at', 'desc')->paginate(3);
    return view('home', [
        "title" => "Beranda",
        'pusat_informasi' => $pusat_informasi
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "Tentang"
    ]);
})->name('external.about');

Route::get('/dosen', [AllDosenController::class, 'index'])->name('external.dosen');
Route::get('/detaildosen/{id}', [AllDosenController::class, 'detail'])->name('alldosen.detail');

Route::get('/informationcenter', [PusatInformasiController::class, 'show_all']);
Route::get('/detail_informationcenter/{id}', [PusatInformasiController::class, 'detail'])->name('informationcenter.detail');

Auth::routes([
    // 'register' => false
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['web', 'auth']], function () {

    // Home
    Route::get('/dashboard/home', [HomeController::class, 'index'])->middleware('role:dosen|akademik')->name('home');

    // Change Password
    Route::get('/changepassword', [ChangePasswordController::class, 'index'])->middleware('role:dosen|akademik')->name('changepassword');
    Route::post('/changepassword', [ChangePasswordController::class, 'change'])->middleware('role:dosen|akademik')->name('changepassword.update');

    // Data Diri
    Route::get('/data_diri', [DataDiriController::class, 'index'])->middleware('role:dosen')->name('data_diri');

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
    Route::get('/pengajaran/{id}/view', [PengajaranController::class, 'view'])->middleware('role:dosen')->name('pengajaran.view');
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
    Route::get('/penelitian/{id}/view', [PenelitianController::class, 'view'])->middleware('role:dosen')->name('penelitian.view');
    Route::put('/penelitian/update/{id}', [PenelitianController::class, 'update'])->middleware('role:dosen')->name('penelitian.update');
    Route::delete('/penelitian/delete/{id}', [PenelitianController::class, 'destroy'])->middleware('role:dosen')->name('penelitian.destroy');


    // Pendidikan
    Route::get('/pendidikan', [PendidikanController::class, 'index'])->middleware('role:dosen')->name('pendidikan');
    Route::get('/pendidikan/create', [PendidikanController::class, 'create'])->middleware('role:dosen')->name('pendidikan.create');
    Route::post('/pendidikan/create', [PendidikanController::class, 'store'])->middleware('role:dosen')->name('pendidikan.store');
    Route::get('/pendidikan/{id}/edit', [PendidikanController::class, 'edit'])->middleware('role:dosen')->name('pendidikan.edit');
    Route::get('/pendidikan/{id}/view', [Pendidikan::class, 'view'])->middleware('role:dosen')->name('pendidikan.view');
    Route::put('/pendidikan/update/{id}', [PendidikanController::class, 'update'])->middleware('role:dosen')->name('pendidikan.update');
    Route::delete('/pendidikan/delete/{id}', [PendidikanController::class, 'destroy'])->middleware('role:dosen')->name('pendidikan.destroy');

    // Pengabdian
    Route::get('/pengabdian', [PengabdianController::class, 'index'])->middleware('role:dosen')->name('pengabdian');
    Route::get('/pengabdian/create', [PengabdianController::class, 'create'])->middleware('role:dosen')->name('pengabdian.create');
    Route::post('/pengabdian/create', [PengabdianController::class, 'store'])->middleware('role:dosen')->name('pengabdian.store');
    Route::get('/pengabdian/{id}/edit', [PengabdianController::class, 'edit'])->middleware('role:dosen')->name('pengabdian.edit');
    Route::get('/pengabdian/{id}/view', [PengabdianController::class, 'view'])->middleware('role:dosen')->name('pengabdian.view');
    Route::put('/pengabdian/update/{id}', [PengabdianController::class, 'update'])->middleware('role:dosen')->name('pengabdian.update');
    Route::delete('/pengabdian/delete/{id}', [PengabdianController::class, 'destroy'])->middleware('role:dosen')->name('pengabdian.destroy');

    // Menu Penunjang
    Route::get('/menu_penunjang', [MenuPenunjangController::class, 'index'])->middleware('role:dosen')->name('menu_penunjang');
    Route::get('/menu_penunjang/create', [MenuPenunjangController::class, 'create'])->middleware('role:dosen')->name('menu_penunjang.create');
    Route::post('/menu_penunjang/create', [MenuPenunjangController::class, 'store'])->middleware('role:dosen')->name('menu_penunjang.store');
    Route::get('/menu_penunjang/{id}/edit', [MenuPenunjangController::class, 'edit'])->middleware('role:dosen')->name('menu_penunjang.edit');
    Route::get('/menu_penunjang/{id}/view', [MenuPenunjangController::class, 'view'])->middleware('role:dosen')->name('menu_penunjang.view');
    Route::put('/menu_penunjang/update/{id}', [MenuPenunjangController::class, 'update'])->middleware('role:dosen')->name('menu_penunjang.update');
    Route::delete('/menu_penunjang/delete/{id}', [MenuPenunjangController::class, 'destroy'])->middleware('role:dosen')->name('menu_penunjang.destroy');

    // Capaian Luaran
    Route::get('/capaian_luaran', [CapaianLuaranController::class, 'index'])->middleware('role:dosen')->name('capaian_luaran');
    Route::get('/capaian_luaran/create', [CapaianLuaranController::class, 'create'])->middleware('role:dosen')->name('capaian_luaran.create');
    Route::post('/capaian_luaran/create', [CapaianLuaranController::class, 'store'])->middleware('role:dosen')->name('capaian_luaran.store');
    Route::get('/capaian_luaran/{id}/edit', [CapaianLuaranController::class, 'edit'])->middleware('role:dosen')->name('capaian_luaran.edit');
    Route::get('/capaian_luaran/{id}/view', [CapaianLuaranController::class, 'view'])->middleware('role:dosen')->name('capaian_luaran.view');
    Route::put('/capaian_luaran/update/{id}', [CapaianLuaranController::class, 'update'])->middleware('role:dosen')->name('capaian_luaran.update');
    Route::delete('/capaian_luaran/delete/{id}', [CapaianLuaranController::class, 'destroy'])->middleware('role:dosen')->name('capaian_luaran.destroy');

    // ROLE AKADEMIK
    Route::get('/dosen/all', [DosenController::class, 'index'])->middleware('role:akademik')->name('dosen');
    Route::get('/dosen/search', [DosenController::class, 'search'])->middleware('role:akademik')->name('dosen.search');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->middleware('role:akademik')->name('dosen.edit');
    Route::delete('/dosen/delete/{id}', [DosenController::class, 'destroy'])->middleware('role:akademik')->name('dosen.destroy');

    // Pendidikan
    Route::get('/dosen/{id}/pendidikan/create', [DosenController::class, 'create_pendidikan'])->middleware('role:akademik')->name('dosen.pendidikan.create');
    Route::post('/dosen/{id}/pendidikan/create', [DosenController::class, 'store_pendidikan'])->middleware('role:akademik')->name('dosen.pendidikan.store');
    Route::get('/dosen/{user_id}/pendidikan/{id}/edit', [DosenController::class, 'edit_pendidikan'])->middleware('role:akademik')->name('dosen.pendidikan.edit');
    Route::put('/dosen/{user_id}/pendidikan/update/{id}', [DosenController::class, 'update_pendidikan'])->middleware('role:akademik')->name('dosen.pendidikan.update');
    Route::delete('/dosen/pendidikan/delete/{id}', [DosenController::class, 'destroy_pendidikan'])->middleware('role:akademik')->name('dosen.pendidikan.destroy');

    // Pengajaran
    Route::get('/dosen/{id}/pengajaran/create', [DosenController::class, 'create_pengajaran'])->middleware('role:akademik')->name('dosen.pengajaran.create');
    Route::post('/dosen/{id}/pengajaran/create', [DosenController::class, 'store_pengajaran'])->middleware('role:akademik')->name('dosen.pengajaran.store');
    Route::get('/dosen/{user_id}/pengajaran/{id}/edit', [DosenController::class, 'edit_pengajaran'])->middleware('role:akademik')->name('dosen.pengajaran.edit');
    Route::put('/dosen/{user_id}/pengajaran/update/{id}', [DosenController::class, 'update_pengajaran'])->middleware('role:akademik')->name('dosen.pengajaran.update');
    Route::delete('/dosen/pengajaran/delete/{id}', [DosenController::class, 'destroy_pengajaran'])->middleware('r ole:akademik')->name('dosen.pengajaran.destroy');

    // Penelitian
    Route::get('/dosen/{id}/penelitian/create', [DosenController::class, 'create_penelitian'])->middleware('role:akademik')->name('dosen.penelitian.create');
    Route::post('/dosen/{id}/penelitian/create', [DosenController::class, 'store_penelitian'])->middleware('role:akademik')->name('dosen.penelitian.store');
    Route::get('/dosen/{user_id}/penelitian/{id}/edit', [DosenController::class, 'edit_penelitian'])->middleware('role:akademik')->name('dosen.penelitian.edit');
    Route::put('/dosen/{user_id}/penelitian/update/{id}', [DosenController::class, 'update_penelitian'])->middleware('role:akademik')->name('dosen.penelitian.update');
    Route::delete('/dosen/penelitian/delete/{id}', [DosenController::class, 'destroy_penelitian'])->middleware('role:akademik')->name('dosen.penelitian.destroy');

    // Pengabdian
    Route::get('/dosen/{id}/pengabdian/create', [DosenController::class, 'create_pengabdian'])->middleware('role:akademik')->name('dosen.pengabdian.create');
    Route::post('/dosen/{id}/pengabdian/create', [DosenController::class, 'store_pengabdian'])->middleware('role:akademik')->name('dosen.pengabdian.store');
    Route::get('/dosen/{user_id}/pengabdian/{id}/edit', [DosenController::class, 'edit_pengabdian'])->middleware('role:akademik')->name('dosen.pengabdian.edit');
    Route::put('/dosen/{user_id}/pengabdian/update/{id}', [DosenController::class, 'update_pengabdian'])->middleware('role:akademik')->name('dosen.pengabdian.update');
    Route::delete('/dosen/pengabdian/delete/{id}', [DosenController::class, 'destroy_pengabdian'])->middleware('role:akademik')->name('dosen.pengabdian.destroy');

    // Penunjang
    Route::get('/dosen/{id}/penunjang/create', [DosenController::class, 'create_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.create');
    Route::post('/dosen/{id}/penunjang/create', [DosenController::class, 'store_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.store');
    Route::get('/dosen/{user_id}/penunjang/{id}/edit', [DosenController::class, 'edit_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.edit');
    Route::put('/dosen/{user_id}/penunjang/update/{id}', [DosenController::class, 'update_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.update');
    Route::delete('/dosen/{user_id}/penunjang/delete/{id}', [DosenController::class, 'destroy_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.destroy');

    // Capaian Luaran
    Route::get('/dosen/{id}/capaian_luaran/create', [DosenController::class, 'create_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.create');
    Route::post('/dosen/{id}/capaian_luaran/create', [DosenController::class, 'store_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.store');
    Route::get('/dosen/{user_id}/capaian_luaran/{id}/edit', [DosenController::class, 'edit_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.edit');
    Route::put('/dosen/{user_id}/capaian_luaran/update/{id}', [DosenController::class, 'update_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.update');
    Route::delete('/dosen/{user_id}/capaian_luaran/delete/{id}', [DosenController::class, 'destroy_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.destroy');

    // Penunjang
    Route::get('/dosen/{id}/penunjang/create', [DosenController::class, 'create_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.create');
    Route::post('/dosen/{id}/penunjang/create', [DosenController::class, 'store_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.store');
    Route::get('/dosen/{user_id}/penunjang/{id}/edit', [DosenController::class, 'edit_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.edit');
    Route::put('/dosen/{user_id}/penunjang/update/{id}', [DosenController::class, 'update_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.update');
    Route::delete('/dosen/{user_id}/penunjang/delete/{id}', [DosenController::class, 'destroy_penunjang'])->middleware('role:akademik')->name('dosen.penunjang.destroy');

    // Capaian Luaran
    Route::get('/dosen/{id}/capaian_luaran/create', [DosenController::class, 'create_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.create');
    Route::post('/dosen/{id}/capaian_luaran/create', [DosenController::class, 'store_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.store');
    Route::get('/dosen/{user_id}/capaian_luaran/{id}/edit', [DosenController::class, 'edit_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.edit');
    Route::put('/dosen/{user_id}/capaian_luaran/update/{id}', [DosenController::class, 'update_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.update');
    Route::delete('/dosen/{user_id}/capaian_luaran/delete/{id}', [DosenController::class, 'destroy_capaian_luaran'])->middleware('role:akademik')->name('dosen.capaian_luaran.destroy');

    // Data Diri
    Route::get('/dosen/{user_id}/identitas/{id}/edit', [DosenController::class, 'edit_identitas'])->middleware('role:akademik')->name('dosen.identitas.edit');
    Route::get('/dosen/{user_id}/kepegawaian/{id}/edit', [DosenController::class, 'edit_kepegawaian'])->middleware('role:akademik')->name('dosen.kepegawaian.edit');
    Route::get('/dosen/{user_id}/alamat_kontak/{id}/edit', [DosenController::class, 'edit_alamat_kontak'])->middleware('role:akademik')->name('dosen.alamat_kontak.edit');
    Route::get('/dosen/{user_id}/lain_lain/{id}/edit', [DosenController::class, 'edit_lain_lain'])->middleware('role:akademik')->name('dosen.lain_lain.edit');
    Route::put('/dosen/{user_id}/identitas/update/{id}', [DosenController::class, 'update_identitas'])->middleware('role:akademik')->name('dosen.identitas.update');
    Route::put('/dosen/{user_id}/alamat_kontak/update/{id}', [DosenController::class, 'update_alamat_kontak'])->middleware('role:akademik')->name('dosen.alamat_kontak.update');
    Route::put('/dosen/{user_id}/lain_lain/update/{id}', [DosenController::class, 'update_lain_lain'])->middleware('role:akademik')->name('dosen.lain.update');
    Route::put('/dosen/{user_id}/kepegawaian/update/{id}', [DosenController::class, 'update_kepegawaian'])->middleware('role:akademik')->name('dosen.kepegawaian.update');


    // Pusat Informasi
    Route::get('/pusat_informasi', [PusatInformasiController::class, 'index'])->middleware('role:akademik')->name('pusat_informasi');
    Route::get('/pusat_informasi/create', [PusatInformasiController::class, 'create'])->middleware('role:akademik')->name('pusat_informasi.create');
    Route::post('/pusat_informasi/create', [PusatInformasiController::class, 'store'])->middleware('role:akademik')->name('pusat_informasi.store');
    Route::get('/pusat_informasi/{id}/edit', [PusatInformasiController::class, 'edit'])->middleware('role:akademik')->name('pusat_informasi.edit');
    Route::delete('/pusat_informasi/delete/{id}', [PusatInformasi::class, 'destroy'])->middleware('role:akademik')->name('pusat_informasi.destroy');
    Route::get('/pusat_informasi/update', [PusatInformasiController::class, 'update_publish_status'])->middleware('role:akademik');
    Route::put('/pusat_informasi/update/{id}', [PusatInformasiController::class, 'update'])->middleware('role:akademik')->name('pusat_informasi.update');

    // Pesan
    Route::get('/pesan', [PesanController::class, 'index'])->middleware('role:akademik')->name('pesan');
    Route::post('/updatePublishStatus', [PesanController::class, 'update_publish_status'])->middleware('role:akademik')->name('pesan.update_publish_status');
    Route::get('/pesan/{id}/edit', [PesanController::class, 'edit'])->middleware('role:akademik')->name('pesan.edit');
    Route::put('/pesan/update/{id}', [PesanController::class, 'update'])->middleware('role:akademik')->name('pesan.update');
    Route::get('/pesan/update', [PesanController::class, 'update_publish_status'])->middleware('role:akademik');

    // Config
    Route::get('/config', [ConfigController::class, 'index'])->middleware('role:akademik')->name('config');
    Route::get('/config/create', [ConfigController::class, 'create'])->middleware('role:akademik')->name('config.create');
    Route::post('/config/create', [ConfigController::class, 'store'])->middleware('role:akademik')->name('config.store');

});
