<?php

namespace App\Http\Controllers;

use App\Models\AlamatKontak;
use App\Models\IdentitasDiri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataDiriController extends Controller
{
    public function index() {

        $user = Auth::user();
        $identitas = IdentitasDiri::where('user_id', $user->id)->get();
        $alamat_kontak = AlamatKontak::where('user_id', $user->id)->get();


        return view('data_diri.index', [
            'user' => $user,
            'identitas' => $identitas,
            'alamat_kontak' => $alamat_kontak
        ]);
    }


}
