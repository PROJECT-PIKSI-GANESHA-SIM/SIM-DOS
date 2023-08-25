<?php

namespace App\Http\Controllers;

use App\Models\CapaianLuaran;
use App\Models\IdentitasDiri;
use App\Models\MenuPenunjang;
use App\Models\Pendidikan;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Pengajaran;
use App\Models\User;
use Illuminate\Http\Request;

class AllDosenController extends Controller
{
    public function index()
    {

        $users_dosen = User::whereHas('roles', function ($query) {
            $query->where('name', 'dosen');
        })
            ->leftJoin('kepegawaian', 'users.id', '=', 'kepegawaian.user_id')
            ->select('users.*', 'kepegawaian.program_studi')
            ->get();

        return view('dosen', [
            'users_dosen' => $users_dosen,
            "title" => "Dosen"
        ]);
    }

    public function kepegawaian()
    {
        return $this->hasOne(Kepegawaian::class, 'user_id');
    }

    public function detail($id)
    {
        $detaildosen = User::findOrFail($id);
        $identitasdiri = IdentitasDiri::find($id);
        $pendidikan = Pendidikan::where('user_id', $id)->get();
        $pengajaran = Pengajaran::where('user_id', $id)->get();
        $penelitian = Penelitian::where('user_id', $id)->get();
        $pengabdian = Pengabdian::where('user_id', $id)->get();
        $penunjang = MenuPenunjang::where('user_id', $id)->get();
        $capaian_luaran = CapaianLuaran::where('user_id', $id)->get();

        return view('detaildosen', [
            "title" => "Detail Dosen",
            "detaildosen" => $detaildosen,
            "identitasdiri" => $identitasdiri,
            "pendidikan" => $pendidikan,
            "pengajaran" => $pengajaran,
            "penelitian" => $penelitian,
            "pengabdian" => $pengabdian,
            "penunjang" => $penunjang,
            "capaian_luaran" => $capaian_luaran
        ]);
    }
}
