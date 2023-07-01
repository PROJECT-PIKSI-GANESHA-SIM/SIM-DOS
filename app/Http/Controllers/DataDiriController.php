<?php

namespace App\Http\Controllers;

use App\Models\IdentitasDiri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataDiriController extends Controller
{
    public function index() {

        $user = Auth::user();
        $identitas = IdentitasDiri::where('user_id', $user->id)->get();

        return view('data_diri.index', [
            'user' => $user,
            'identitas' => $identitas
        ]);
    }

    public function edit_identitas($id) {
        $identitas_diri = IdentitasDiri::findOrFail($id);

        return view('data_diri.edit-identitas', [
            'identitas' => $identitas_diri
        ]);
    }
}
