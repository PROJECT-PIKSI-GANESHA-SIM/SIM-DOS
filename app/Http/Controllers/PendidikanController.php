<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use App\Models\Pendidikan;
use App\Models\PredikatKelulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendidikanController extends Controller
{
    public function index() {

        // Get Id User
        $user = Auth::user();

        $pendidikan = Pendidikan::where('user_id', $user->id)->paginate(5);

        return view('pendidikan.index', compact('pendidikan'));
    }

    public function create() {

        // get jenjang pendidikan
        $jenjang_pendidikan = JenjangPendidikan::all();

        // get predikat kelulusan
        $predikat_kelulusan = PredikatKelulusan::all();

        return view('pendidikan.create', [
            'jenjang_pendidikan' => $jenjang_pendidikan,
            'predikat_kelulusan' => $predikat_kelulusan
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
            'judul_penelitian' => 'max:250',
            'file_ijazah' => 'file|mimes:pdf|max:2048',
            'transkrip_nilai' => 'file|mimes:pdf|max:2048',
        ]);

        // Get Id User
        $user = Auth::user();

        // kondisi jika kedua file di uplaod
        if($request->hasFile('file_ijazah') && $request->hasFile('transkrip_nilai')) {

            // upload file ijazah
            $ijazah = $request->file('file_ijazah');
            $ijazah->storeAs('public/dosen/pendidikan/ijazah', $ijazah->hashName());

            // upload transkrip nilai
            $transkrip_nilai = $request->file('transkrip_nilai');
            $transkrip_nilai->storeAs('public/dosen/pendidikan/transkrip_nilai', $transkrip_nilai->hashName());

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

        } else if($request->hasFile('file_ijazah')) {
            // kondisi jika hanya mengupload file ijazah saja

            // upload file ijazah
            $ijazah = $request->file('file_ijazah');
            $ijazah->storeAs('public/dosen/pendidikan/ijazah', $ijazah->hashName());

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
                'user_id' => $user->id,
            ]);

        } else if ($request->hasFile('transkrip_nilai')) {

            // kondisi jika hanya mengupload transkrip_nilai

            // upload transkrip nilai
            $transkrip_nilai = $request->file('transkrip_nilai');
            $transkrip_nilai->storeAs('public/dosen/pendidikan/transkrip_nilai', $transkrip_nilai->hashName());

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
                'transkrip_nilai' => $transkrip_nilai->hashName(),
                'user_id' => $user->id,
            ]);

        } else {
            // kondisi jika tikak mengupload kedua file

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
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('dosen.edit')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function edit($id) {
        
        // get pendidikan by id
        $pendidikan = Pendidikan::findOrFail($id);

        // get jenjang pendidikan
        $jenjang_pendidikan = JenjangPendidikan::all();

        // get predikat kelulusan
        $predikat_kelulusan = PredikatKelulusan::all();

        return view('pendidikan.edit', [
            'pendidikan' => $pendidikan,
            'jenjang_pendidikan' => $jenjang_pendidikan,
            'predikat_kelulusan' => $predikat_kelulusan
        ]);
    }

    public function update(Request $request, $id) {

        $pendidikan = Pendidikan::findOrFail($id);

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
            'judul_penelitian' => 'max:250',
            'file_ijazah' => 'file|mimes:pdf|max:2048',
            'transkrip_nilai' => 'file|mimes:pdf|max:2048',
        ]);

        // Get Id User
        $user = Auth::user();

        // kondisi jika file ijazah dan transkirp nilai di upload
        if($request->hasFile('file_ijazah') && $request->hasFile('transkrip_nilai')) {
            
            // upload file ijazah
            $ijazah = $request->file('file_ijazah');
            $ijazah->storeAs('public/dosen/pendidikan/ijazah', $ijazah->hashName());

            // upload transkrip nilai
            $transkrip_nilai = $request->file('transkrip_nilai');
            $transkrip_nilai->storeAs('public/dosen/pendidikan/transkrip_nilai', $transkrip_nilai->hashName());
            
            Storage::delete('public/dosen/pendidikan/ijazah/'. $pendidikan->file_ijazah);
            Storage::delete('public/dosen/pendidikan/transkrip_nilai/'. $pendidikan->transkrip_nilai);

            // update pendidikan
            $pendidikan->update([
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

        } else if ($request->hasFile('file_ijazah')) {
            // kondisi ketika hanya mengupload file ijazah

            // upload file ijazah
            $ijazah = $request->file('file_ijazah');
            $ijazah->storeAs('public/dosen/pendidikan/ijazah', $ijazah->hashName());
            
            Storage::delete('public/dosen/pendidikan/ijazah/'. $pendidikan->file_ijazah);

            // update pendidikan
            $pendidikan->update([
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
                'user_id' => $user->id,
            ]);
        } else if($request->hasFile('transkrip_nilai')) {

            // kondisi ketika hanya mengupload file transkrip nilai saja

            // upload transkrip nilai
            $transkrip_nilai = $request->file('transkrip_nilai');
            $transkrip_nilai->storeAs('public/dosen/pendidikan/transkrip_nilai', $transkrip_nilai->hashName());

            Storage::delete('public/dosen/pendidikan/transkrip_nilai/'. $pendidikan->transkrip_nilai);
        
            // update pendidikan
            $pendidikan->update([
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
                'transkrip_nilai' => $transkrip_nilai->hashName(),
                'user_id' => $user->id,
            ]);

        } else {
            
            // kondisi ketika tikak mengupload file ijazah dan transkrip nilai

            // update pendidikan
            $pendidikan->update([
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
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('pendidikan')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    public function destroy($id) {
        
        $pendidikan = Pendidikan::findOrFail($id);

        // hapus gambar bukti pengajaran dan bukti presensi
        Storage::delete('public/dosen/pendidikan/file_ijazah/'. $pendidikan->file_ijazah);
        Storage::delete('public/dosen/pendidikan/transkrip_nilai/'. $pendidikan->transkrip_nilai);
        
        // hapus pendidikan
        $pendidikan->delete();

        return redirect()->route('pendidikan')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
