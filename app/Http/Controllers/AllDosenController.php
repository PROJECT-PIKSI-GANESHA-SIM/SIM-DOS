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
        $pendidikan = Pendidikan::where('user_id', $id)->get();
        $pengajaran = Pengajaran::where('user_id', $id)->get();
        $penelitian = Penelitian::where('user_id', $id)->get();
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
