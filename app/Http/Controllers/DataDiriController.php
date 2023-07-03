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

    public function edit_kepegawaian($id) {
        $user = Auth::user();
        $kepegawaian = Kepegawaian::findOrFail($id);

        return view('data_diri.edit-kepegawaian', [
            'user' => $user,
            'kepegawaian' => $kepegawaian
        ]);
    }

    public function update_kepegawaian(Request $request, $id) {

        $kepegawaian = Kepegawaian::findOrFail($id);

        // Validasi Form
        $this->validate($request, [
            'program_studi' => 'required',
            'status_kepegawaian' => 'required',
            'status_keaktifan' => 'required',
            'no_sk_sertifikasi_dosen' => 'required',
            'jabatan_fungsional' => 'required',
            'no_sk_tmmd' => 'required',
            'tanggal_menjadi_dosen' => 'required',
            'pangkat_golongan' => 'required'
        ]);

        $kepegawaian->update([
            'program_studi' => $request->program_studi,
            'status_kepegawaian' => $request->status_keaktifan,
            'status_keaktifan' => $request->status_keaktifan,
            'no_sk_sertifikasi_dosen' => $request->no_sk_sertifikasi_dosen,
            'jabatan_fungsional' => $request->jabatan_fungsional,
            'no_sk_tmmd' => $request->no_sk_tmmd,
            'tanggal_menjadi_dosen' => $request->tanggal_menjadi_dosen,
            'pangkat_golongan' => $request->pangkat_golongan
        ]);

        return redirect()->route('data_diri')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function edit_lain($id) {
        $user = Auth::user();
        $lain = LainLain::findOrFail($id);

        return view('data_diri.edit-lain', [
            'user' => $user,
            'lain' => $lain
        ]);

    }

    public function update_lain(Request $request, $id) {
        
        $user = Auth::user($id);
        $lain = LainLain::findOrFail($id);

        // Validasi Form
        $this->validate($request, [
            'npwp' => 'required',
            'nama_wajib_pajak' => 'required',
            'sinta_id' => 'required'
        ]);


        $lain->update([
            'npwp' => $request->npwp,
            'nama_wajib_pajak' => $request->nama_wajib_pajak,
            'sinta_id' => $request->sinta_id,
        ]);

        return redirect()->route('data_diri')->with(['success' => 'Data Berhasil Diupdate!']);

    }

}
