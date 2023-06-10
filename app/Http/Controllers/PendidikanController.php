<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendidikanController extends Controller
{
    public function index() {
        return view('pendidikan.index');
    }

    public function create() {

        // get jenjang pendidikan
        $jenjang_pendidikan = JenjangPendidikan::all();

        return view('pendidikan.create', [
            'jenjang_pendidikan' => $jenjang_pendidikan
        ]);
    }

    public function store(Request $request) {
        // validasi form
        $this->validate($request, [
            'jenjang_pendidikan' => 'required',
            'bidang_studi' => 'required',
            'nama_institusi' => 'required',
            'lokasi_institusi' => 'required',
            'dalam_luar_negeri' => 'required',
            'no_ijazah' => 'required',
            'predikat_kelulusan' => 'required',
            'gelar_singkat' => 'required',
            'gelar_panjang' => 'required',
            'tanggal_mulai_studi' => 'required',
            'tanggal_berakhir_studi' => 'required',
            'judul_penelitian' => 'max:50',
            'file_ijazah' => 'file|mimes:pdf|max:2048',
            'transkrip_nilai' => 'file|mimes:pdf|max:2048',
        ]);
        if($request->hasFile('file_ijazah') && $request->hasFile('transkrip_nilai')) {

            // upload file ijazah
            $ijazah = $request->file('file_ijazah');
            $ijazah->storeAs('public/dosen/pendidikan/ijazah', $ijazah->hashName());

            // upload transkrip nilai
            $transkrip_nilai = $request->file('transkrip_nilai');
            $transkrip_nilai->storeAs('public/dosen/pendidikan/transkrip_nilai', $transkrip_nilai->hashName());

            // Get Id User
            $user = Auth::user();

            // create pendidikan
            Pendidikan::create([
                'jenjang_pendidikan' => $request->jenjang_pendidikan,
                'bidang_studi' => $request->bidang_studi,
                'nama_instansi' => $request->nama_institusi,
                'lokasi_institusi' => $request->lokasi_institusi,
                'dalam_luar_negeri' => $request->dalam_luar_negeri,
                'nomor_ijazah' => $request->no_ijazah,
                'predikat_kelulusan' => $request->predikat_kelulusan,
                'gelar_singkat' => $request->gelar_singkat,
                'gelar_panjang' => $request->gelar_panjang,
                'tanggal_mulai_studi' => $request->tanggal_mulai_studi,
                'tanggal_berakhir_studi' => $request->tanggal_berakhir_studi,
                'judul_penelitian' => $request->judul_penelitian,
                'file_ijazah' => $ijazah->hashName(),
                'transkrip_nilai' => $transkrip_nilai->hashName(),
                'user_id' => $user->id,
            ]);
            

        }

        return redirect()->route('pendidikan')->with(['success' => 'Data Berhasil Disimpan!']);

    }
}
