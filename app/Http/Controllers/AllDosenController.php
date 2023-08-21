<?php

namespace App\Http\Controllers;

use App\Models\IdentitasDiri;
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
        })->paginate(5);

        return view('dosen', [
            'users_dosen' => $users_dosen,
            "title" => "Dosen"
        ]);
    }

    public function detail($id)
    {
        $detaildosen = User::findOrFail($id);
        $identitasdiri = IdentitasDiri::findOrFail($id);
        $pendidikan = Pendidikan::where('user_id', $id)->get(); // Mengambil semua pendidikan terkait user_id
        $pengajaran = Pengajaran::findOrFail($id);
        $penelitian = Penelitian::findOrFail($id);
        $pengabdian = Pengabdian::findOrFail($id);

        return view('detaildosen', [
            "title" => "Detail Dosen",
            "detaildosen" => $detaildosen,
            "identitasdiri" => $identitasdiri,
            "pendidikan" => $pendidikan,
            "pengajaran" => $pengajaran,
            "penelitian" => $penelitian,
            "pengabdian" => $pengabdian
        ]);
    }
}
