<?php

namespace App\Http\Controllers;

use App\Models\AlamatKontak;
use App\Models\IdentitasDiri;
use App\Models\Kepegawaian;
use App\Models\LainLain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataDiriController extends Controller
{
    public function index() {

        $user = Auth::user();
        $identitas = IdentitasDiri::where('user_id', $user->id)->get();
        $alamat_kontak = AlamatKontak::where('user_id', $user->id)->get();
        $lain_lain = LainLain::where('user_id', $user->id)->get();
        $kepegawaian = Kepegawaian::where('user_id', $user->id)->get();


        return view('data_diri.index', [
            'user' => $user,
            'identitas' => $identitas,
            'alamat_kontak' => $alamat_kontak,
            'lain_lain' => $lain_lain,
            'kepegawaian' => $kepegawaian
        ]);
    }

    public function edit_identitas($id) {

        $user = Auth::user();
        $identitas = IdentitasDiri::findOrFail($id);

        return view('data_diri.edit-identitas', [
            'user' => $user,
            'identitas' => $identitas
        ]);
    }

    public function edit_alamat_kontak($id) {
        $user = Auth::user();
        $alamat_kontak = AlamatKontak::findOrFail($id);

        return view('data_diri.edit-alamat-kontak', [
            'user' => $user,
            'alamat_kontak' => $alamat_kontak
        ]);

    }

}
