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

    public function update_identitas(Request $request, $id) {

        $identitas = IdentitasDiri::findOrFail($id);
        $user = Auth::user();

        // Validasi Form
        $this->validate($request, [
            'nidn' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'golongan_darah' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|string|max:255',
            'status_perkawinan' => 'required|string|max:255'
        ]);

        $identitas->update([
            'nip' => $request->nip,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan_darah' => $request->golongan_darah,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_perkawinan' => $request->status_perkawinan
        ]);

        $user->nidn = $request->nidn;

        return redirect()->route('data_diri')->with(['success' => 'Data Berhasil Diupdate!']);

    }

    public function edit_alamat_kontak($id) {
        $user = Auth::user();
        $alamat_kontak = AlamatKontak::findOrFail($id);

        return view('data_diri.edit-alamat-kontak', [
            'user' => $user,
            'alamat_kontak' => $alamat_kontak
        ]);
    }

    public function update_alamat_kontak(Request $request, $id) {

        $alamat_kontak = AlamatKontak::findOrFail($id);
        $user = Auth::user();

        // Validasi Form
        $this->validate($request, [
            'alamat' => 'required|string|max:255',
            'rt' => 'required|string|max:255',
            'rw' => 'required|string|max:255',
            'no' => 'required|string|max:255',
            'desa_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota_kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            'no_telepon_rumah' => 'required|string|max:255',
            'no_handphone' => 'required|string|max:255',
        ]);

        $alamat_kontak->update([
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'no' => $request->no,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota_kabupaten' => $request->kota_kabupaten,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
            'no_telepon_rumah' => $request->no_telepon_rumah,
        ]);

        $user->no_telpn = $request->no_handphone;
        $user->save();

        return redirect()->route('data_diri')->with(['success' => 'Data Berhasil Diupdate!']);

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
            'program_studi' => 'required|string|max:255',
            'status_kepegawaian' => 'required|string|max:255',
            'status_keaktifan' => 'required|string|max:255',
            'no_sk_sertifikasi_dosen' => 'required|string|max:255',
            'jabatan_fungsional' => 'required|string|max:255',
            'no_sk_tmmd' => 'required|string|max:255',
            'tanggal_menjadi_dosen' => 'required|string|max:255',
            'pangkat_golongan' => 'required|string|max:255'
        ]);

        $kepegawaian->update([
            'program_studi' => $request->program_studi,
            'status_kepegawaian' => $request->status_kepegawaian,
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
            'npwp' => 'required|string|max:255',
            'nama_wajib_pajak' => 'required|string|max:255',
            'sinta_id' => 'required|string|max:255'
        ]);


        $lain->update([
            'npwp' => $request->npwp,
            'nama_wajib_pajak' => $request->nama_wajib_pajak,
            'sinta_id' => $request->sinta_id,
        ]);

        return redirect()->route('data_diri')->with(['success' => 'Data Berhasil Diupdate!']);

    }

}
