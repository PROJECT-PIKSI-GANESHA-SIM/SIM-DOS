<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use App\Models\Pendidikan;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Pengajaran;
use App\Models\PredikatKelulusan;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class DosenController extends Controller
{
    public function index() {

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'dosen');
        })->paginate(5);

        return view('akademik.dosen.index', compact('users'));
    }

    public function edit($id) {

        $user = User::findOrFail($id);
        $pendidikan = Pendidikan::where('user_id', $user->id)->paginate(5);
        $pengajaran = Pengajaran::where('user_id', $user->id)->paginate(5);
        $penelitian = Penelitian::where('user_id', $user->id)->paginate(5);
        $pengabdian = Pengabdian::where('user_id', $user->id)->paginate(5);

        return view('akademik.dosen.detail', [
            'user' => $user,
            'pendidikan' => $pendidikan,
            'pengajaran' => $pengajaran,
            'penelitian' => $penelitian,
            'pengabdian' => $pengabdian
        ]);
    }

    // PENDIDIKAN

    public function create_pendidikan($id) {

        $user = User::findOrFail($id);
        $jenjang_pendidikan = JenjangPendidikan::all();
        $predikat_kelulusan = PredikatKelulusan::all();

        return view('akademik.dosen.pendidikan.create', [
            'user' => $user,
            'jenjang_pendidikan' => $jenjang_pendidikan,
            'predikat_kelulusan' => $predikat_kelulusan
        ]);
    }

    public function store_pendidikan(Request $request, $id) {
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
                'user_id' => $id,
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
                'user_id' => $id,
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
                'user_id' => $id,
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
                'user_id' => $id,
            ]);
        }

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function edit_pendidikan($id) {
        
        // get pendidikan by id
        $pendidikan = Pendidikan::findOrFail($id);

        // get jenjang pendidikan
        $jenjang_pendidikan = JenjangPendidikan::all();

        // get predikat kelulusan
        $predikat_kelulusan = PredikatKelulusan::all();
        
        return view('akademik.dosen.pendidikan.edit', [
            'pendidikan' => $pendidikan,
            'jenjang_pendidikan' => $jenjang_pendidikan,
            'predikat_kelulusan' => $predikat_kelulusan
        ]);
    }

    public function destroy_pendidikan($id) {
        
        $pendidikan = Pendidikan::findOrFail($id);

        // hapus gambar bukti pengajaran dan bukti presensi
        Storage::delete('public/dosen/pendidikan/file_ijazah/'. $pendidikan->file_ijazah);
        Storage::delete('public/dosen/pendidikan/transkrip_nilai/'. $pendidikan->transkrip_nilai);
        
        // hapus pendidikan
        $pendidikan->delete();

        return redirect()->route('dosen')->with(['success' => 'Data Berhasil Dihapus!']);
    }


    // PENGAJARAN

    public function create_pengajaran($id) {

        $program_studi = ProgramStudi::all();
        $user = User::findOrFail($id);

        return view('akademik.dosen.pengajaran.create', [
            'user' => $user,
            'program_studi' => $program_studi
        ]);
    }

    public function store_pengajaran(Request $request, $id) {

        // Validasi Form
        $this->validate($request, [
            'tahun_ajar' => 'required',
            'program_studi' => 'required',
            'matkul' => 'required',
            'jenis_matkul' => 'required',
            'kelas' => 'required',
            'sks' => 'required',
            'jumlah_mahasiswa' => 'required',
            'bukti_pengajaran' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bukti_presensi' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // Kondisi jika bukti pengajaran dan bukti presensi di upload
        if($request->hasFile('bukti_pengajaran') && $request->hasFile('bukti_presensi')) {
            
            // upload bukti pengajaran
            $bukti_pengajaran = $request->file('bukti_pengajaran');
            $bukti_pengajaran->storeAs('public/dosen/pengajaran/bukti_pengajaran', $bukti_pengajaran->hashName());
            
            // upload bukti presensi
            $bukti_presensi = $request->file('bukti_presensi');
            $bukti_presensi->storeAs('public/dosen/pengajaran/bukti_presensi', $bukti_presensi->hashName());

            // Create Pengajaran
            Pengajaran::create([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'bukti_pengajaran' => $bukti_pengajaran->hashName(),
                'bukti_presensi' => $bukti_presensi->hashName(),
                'user_id' => $id,
            ]);

        } else if ($request->hasFile('bukti_pengajaran')) {
            // kondisi jika hanya bukti pengajaran saja yang di uplaod

            // upload bukti pengajaran
            $bukti_pengajaran = $request->file('bukti_pengajaran');
            $bukti_pengajaran->storeAs('public/dosen/pengajaran/bukti_pengajaran', $bukti_pengajaran->hashName());

            // Create Pengajaran
            Pengajaran::create([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'bukti_pengajaran' => $bukti_pengajaran->hashName(),
                'user_id' => $id,
            ]);

        } else if($request->hasFile('bukti_presensi')) {
            // kondisi jika hanya bukti presensi saja yang di upload

            // upload bukti presensi
            $bukti_presensi = $request->file('bukti_presensi');
            $bukti_presensi->storeAs('public/dosen/pengajaran/bukti_presensi', $bukti_presensi->hashName());

            // Create Pengajaran
            Pengajaran::create([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'bukti_presensi' => $bukti_presensi->hashName(),
                'user_id' => $id,
            ]);

        } else {

            // kondisi jika tidak mengupload bukti pengajaran dan bukti presensi

            // Create Pengajaran
            Pengajaran::create([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'user_id' => $id,
            ]);

        }

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

}
