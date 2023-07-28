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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class DosenController extends Controller
{
    public function index() {

        $users_dosen = User::whereHas('roles', function ($query) {
            $query->where('name', 'dosen');
        })->paginate(5);

        $users = Auth::user();

        return view('akademik.dosen.index', [
            'users_dosen' => $users_dosen,
            'users' => $users
        ]);
    }

    public function search(Request $request) {

        $cari = $request->search;

        $users = Auth::user();
        $users_dosen = User::whereHas('roles', function ($query) {
            $query->where('name', 'dosen');
        })
        ->where('name', 'LIKE', '%'.$cari.'%')
        ->paginate(5);

        return view('akademik.dosen.index', [
            'user' => $users,
            'users_dosen' => $users_dosen
            
        ]);
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
            'jenjang_pendidikan' => 'required|string:max:255',
            'bidang_studi' => 'required|string:max:255',
            'nama_institusi' => 'required|string:max:255',
            'lokasi_institusi' => 'required|string:max:255',
            'dalam_luar_negeri' => 'required|string:max:255',
            'no_ijazah' => 'required|string:max:255',
            'predikat_kelulusan' => 'required|string:max:255',
            'gelar_singkat' => 'required|string:max:255',
            'gelar_panjang' => 'required|string:max:255',
            'tanggal_mulai_studi' => 'required|string:max:255',
            'tanggal_berakhir_studi' => 'required|string:max:255',
            'judul_penelitian' => 'string|max:250',
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

    public function edit_pendidikan($user_id, $id) {
        
        $user = User::findOrFail($user_id);

        // get pendidikan by id
        $pendidikan = Pendidikan::findOrFail($id);

        // get jenjang pendidikan
        $jenjang_pendidikan = JenjangPendidikan::all();

        // get predikat kelulusan
        $predikat_kelulusan = PredikatKelulusan::all();
        
        return view('akademik.dosen.pendidikan.edit', [
            'pendidikan' => $pendidikan,
            'jenjang_pendidikan' => $jenjang_pendidikan,
            'predikat_kelulusan' => $predikat_kelulusan,
            'user' => $user
        ]);
    }

    public function update_pendidikan(Request $request, $user_id, $id) {

        $pendidikan = Pendidikan::findOrFail($id);

        // validasi form
        $this->validate($request, [
            'jenjang_pendidikan' => 'required|string|max:255',
            'bidang_studi' => 'required|string|max:255',
            'nama_institusi' => 'required|string|max:255',
            'lokasi_institusi' => 'required|string|max:255',
            'dalam_luar_negeri' => 'required|string|max:255',
            'no_ijazah' => 'required|string|max:255',
            'predikat_kelulusan' => 'required|string|max:255',
            'gelar_singkat' => 'required|string|max:255',
            'gelar_panjang' => 'required|string|max:255',
            'tanggal_mulai_studi' => 'required|string|max:255',
            'tanggal_berakhir_studi' => 'required|string|max:255',
            'judul_penelitian' => 'string|max:255',
            'file_ijazah' => 'file|mimes:pdf|max:2048',
            'transkrip_nilai' => 'file|mimes:pdf|max:2048',
        ]);

        // Get Id User
        $user = User::findOrFail($user_id);

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

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    public function destroy_pendidikan($id) {
        
        $pendidikan = Pendidikan::findOrFail($id);

        // hapus gambar bukti pengajaran dan bukti presensi
        Storage::delete('public/dosen/pendidikan/file_ijazah/'. $pendidikan->file_ijazah);
        Storage::delete('public/dosen/pendidikan/transkrip_nilai/'. $pendidikan->transkrip_nilai);
        
        // hapus pendidikan
        $pendidikan->delete();

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Dihapus!']);
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
            'tahun_ajar' => 'required|string:max:255',
            'program_studi' => 'required|string:max:255',
            'matkul' => 'required|string:max:255',
            'jenis_matkul' => 'required|string:max:255',
            'kelas' => 'required|string:max:255',
            'sks' => 'required|string:max:255',
            'jumlah_mahasiswa' => 'required|string:max:255',
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

    public function edit_pengajaran($user_id, $id) {
        
        $pengajaran = Pengajaran::findOrFail($id);
        $program_studi = ProgramStudi::all();
        $user = User::findOrFail($user_id);

        return view('akademik.dosen.pengajaran.edit', [
            'pengajaran' => $pengajaran,
            'program_studi' => $program_studi,
            'user' => $user
        ]);
    }

    public function update_pengajaran(Request $request, $user_id, $id) {
        $pengajaran = Pengajaran::findOrFail($id);
        // dd($pengajaran->bukti_presensi);

        // Validasi Form
        $this->validate($request, [
            'tahun_ajar' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'matkul' => 'required|string|max:255',
            'jenis_matkul' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'sks' => 'required|string|max:255',
            'jumlah_mahasiswa' => 'required|string|max:255',
            'bukti_pengajaran' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bukti_presensi' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get Id User
        $user = User::findOrFail($user_id);

        // Kondisi jika bukti pengajaran dan bukti presensi di upload
        if($request->hasFile('bukti_pengajaran') && $request->hasFile('bukti_presensi')) {
            
            // upload bukti pengajaran
            $bukti_pengajaran = $request->file('bukti_pengajaran');
            $bukti_pengajaran->storeAs('public/dosen/pengajaran/bukti_pengajaran', $bukti_pengajaran->hashName());
            
            // upload bukti presensi
            $bukti_presensi = $request->file('bukti_presensi');
            $bukti_presensi->storeAs('public/dosen/pengajaran/bukti_presensi', $bukti_presensi->hashName());
            
            // Hapus image terdahulu
            Storage::delete('public/dosen/pengajaran/bukti_pengajaran/'. $pengajaran->bukti_pengajaran);
            Storage::delete('public/dosen/pengajaran/bukti_presensi/'. $pengajaran->bukti_presensi);

            // Update pengajaran

            $pengajaran->update([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'bukti_pengajaran' => $bukti_pengajaran->hashName(),
                'bukti_presensi' => $bukti_presensi->hashName(),
                'user_id' => $user->id,
            ]);

        } else if ($request->hasFile('bukti_pengajaran')) {
            // kondisi jika hanya meng upload bukti pengajaran

            // upload bukti pengajaran
            $bukti_pengajaran = $request->file('bukti_pengajaran');
            $bukti_pengajaran->storeAs('public/dosen/pengajaran/bukti_pengajaran', $bukti_pengajaran->hashName());

            // Hapus image terdahulu
            Storage::delete('public/dosen/pengajaran/bukti_pengajaran/'. $pengajaran->bukti_pengajaran);

            // Update pengajaran

            $pengajaran->update([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'bukti_pengajaran' => $bukti_pengajaran->hashName(),
                'user_id' => $user->id,
            ]);

        } else if ($request->hasFile('bukti_presensi')) {

            // kondisi jika hanya meng update bukti presensi saja

            // upload bukti presensi
            $bukti_presensi = $request->file('bukti_presensi');
            $bukti_presensi->storeAs('public/dosen/pengajaran/bukti_presensi', $bukti_presensi->hashName());

            // Hapus image terdahulu
            Storage::delete('public/dosen/pengajaran/bukti_presensi/'. $pengajaran->bukti_presensi);

            // Update pengajaran

            $pengajaran->update([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'bukti_presensi' => $bukti_presensi->hashName(),
                'user_id' => $user->id,
            ]);
        } else {
            // kondisi jika tidak mengupdate image

            // Update pengajaran

            $pengajaran->update([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy_pengajaran($id) {
        
        $pengajaran = Pengajaran::findOrFail($id);

        // hapus gambar bukti pengajaran dan bukti presensi
        Storage::delete('public/dosen/pengajaran/bukti_pengajaran/'. $pengajaran->bukti_pengajaran);
        Storage::delete('public/dosen/pengajaran/bukti_presensi/'. $pengajaran->bukti_presensi);
        
        // hapus pengajaran
        $pengajaran->delete();

        return redirect()->route('dosen,edit', $id)->with(['success' => 'Data Berhasil Dihapus!']);
    }

    // PENELITIAN

    public function create_penelitian($id) {

        $user = User::findOrFail($id);

        return view('akademik.dosen.penelitian.create', [
            'user' => $user,
        ]);
    }

    public function store_penelitian(Request $request, $id) {

        // Validasi Form
        $this->validate($request, [
            'status_peneliti' => 'required|string:max:255',
            'kelompok_bidang' => 'required|string:max:255',
            'judul_penelitian' => 'required|string:max:255',
            'lokasi_kegiatan' => 'required|string:max:255',
            'tahun_usulan' => 'required|string:max:255',
            'tahun_kegiatan' => 'required|string:max:255',
            'lama_kegiatan' => 'required|string:max:255',
            'jumlah_dana' => 'required|string:max:255',
            'sumber_dana' => 'required|string:max:255',
            'no_sk_penugasan' => 'required|string:max:255',
            'tanggal_sk_penugasan' => 'required|string:max:255',
            'link_publikasi' => 'required|string:max:255',
            'surat_tugas' => 'file|mimes:pdf|max:2048',
            'publikasi' => 'file|mimes:pdf|max:2048',
            
        ]);

        // Kondisi jika surat tugas dan publikasi di upload

        if($request->hasFile('surat_tugas') && $request->hasFile('publikasi')) {

            // upload bukti surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/penelitian/surat_tugas', $surat_tugas->hashName());
            
            // upload publikasi
            $publikasi = $request->file('publikasi');
            $publikasi->storeAs('public/dosen/penelitian/publikasi', $publikasi->hashName());

            // Create Penelitian
            Penelitian::create([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'publikasi' => $publikasi->hashName(),
                'user_id' => $id
            ]);

        } else if($request->hasFile('surat_tugas')) {

            // upload bukti surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/penelitian/surat_tugas', $surat_tugas->hashName());

            // Create Penelitian
            Penelitian::create([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'user_id' => $id
            ]);

        } else if($request->hasFile('publikasi')) {
            
            // upload publikasi
            $publikasi = $request->file('publikasi');
            $publikasi->storeAs('public/dosen/penelitian/publikasi', $publikasi->hashName());

            // Create Penelitian
            Penelitian::create([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'publikasi' => $publikasi->hashName(),
                'user_id' => $id
            ]);
        } else {
            // Create Penelitian
            Penelitian::create([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'user_id' => $id
            ]);
        }

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function edit_penelitian($user_id, $id) {

        $penelitian = Penelitian::findOrFail($id);
        $user = User::findOrFail($user_id);

        return view('akademik.dosen.penelitian.edit', [
            'penelitian' => $penelitian,
            'user' => $user
        ]);

    }

    public function update_penelitian(Request $request, $user_id, $id) {

        $penelitian = Penelitian::findOrFail($id);

        // Validasi Form
        $this->validate($request, [
            'status_peneliti' => 'required|string|max:255',
            'kelompok_bidang' => 'required|string|max:255',
            'judul_penelitian' => 'required|string|max:255',
            'lokasi_kegiatan' => 'required|string|max:255',
            'tahun_usulan' => 'required|string|max:255',
            'tahun_kegiatan' => 'required|string|max:255',
            'lama_kegiatan' => 'required|string|max:255',
            'jumlah_dana' => 'required|string|max:255',
            'sumber_dana' => 'required|string|max:255',
            'no_sk_penugasan' => 'required|string|max:255',
            'tanggal_sk_penugasan' => 'required|string|max:255',
            'link_publikasi' => 'required|string|max:255',
            'surat_tugas' => 'file|mimes:pdf|max:2048',
            'publikasi' => 'file|mimes:pdf|max:2048',
        ]);

        // Get Id User
        $user = User::findOrFail($user_id);

        // Kondisi jika surat tugas dan publikasi di upload

        if($request->hasFile('surat_tugas') && $request->hasFile('publikasi')) {

            // upload bukti surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/penelitian/surat_tugas', $surat_tugas->hashName());
            
            // upload publikasi
            $publikasi = $request->file('publikasi');
            $publikasi->storeAs('public/dosen/penelitian/publikasi', $publikasi->hashName());

            // Hapus file terdahulu
            Storage::delete('public/dosen/penelitian/surat_tugas/'. $penelitian->surat_tugas);
            Storage::delete('public/dosen/penelitian/publikasi/'. $penelitian->publikasi);


            // Create Penelitian
            $penelitian->update([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'publikasi' => $publikasi->hashName(),
                'user_id' => $user->id
            ]);

        } else if($request->hasFile('surat_tugas')) {

            // upload bukti surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/penelitian/surat_tugas', $surat_tugas->hashName());

            // Hapus file terdahulu
            Storage::delete('public/dosen/penelitian/surat_tugas/'. $penelitian->surat_tugas);


            // Update Penelitian
            $penelitian->update([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'user_id' => $user->id
            ]);

        } else if($request->hasFile('publikasi')) {
            
            // upload publikasi
            $publikasi = $request->file('publikasi');
            $publikasi->storeAs('public/dosen/penelitian/publikasi', $publikasi->hashName());

            // Hapus file terdahulu
            Storage::delete('public/dosen/penelitian/publikasi/'. $penelitian->publikasi);


            // Update Penelitian
            $penelitian->update([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'publikasi' => $publikasi->hashName(),
                'user_id' => $user->id
            ]);
        } else {

            // Update Penelitian

            $penelitian->update([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Diupdate!']);

    }

    public function destroy_penelitian($id) {
        
        $penelitian = Penelitian::findOrFail($id);

        // hapus gambar bukti pengajaran dan bukti presensi
        Storage::delete('public/dosen/penelitian/surat_tugas/'. $penelitian->surat_tugas);
        Storage::delete('public/dosen/penelitian/publikasi/'. $penelitian->publikasi);
        
        // hapus penelitian
        $penelitian->delete();

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Dihapus']);
    }

    // PENGABDIAN
    function create_pengabdian($id) {

        $user = User::findOrFail($id);

        return view('akademik.dosen.pengabdian.create', [
            'user' => $user
        ]);
    }

    public function store_pengabdian(Request $request, $id) {
        
        // validasi form
        $this->validate($request, [
            'judul_pengabdian' => 'required|string:max:255',
            'bidang_keilmuan' => 'required|string:max:255',
            'latar_belakang' => 'required|string:max:255',
            'manfaat' => 'required|string:max:255',
            'sasaran' => 'required|string:max:255',
            'tahun_pelaksanaan' => 'required|string:max:255',
            'lama_kegiatan' => 'required|string:max:255',
            'lokasi_pelaksanaan' => 'required|string:max:255',
            'biaya_kegiatan' => 'string|max:100',
            'kelompok_target' => 'required|string:max:255',
            'kendala' => 'string|max:1000',
            'hasil' => 'string|max:1000',
            'evaluasi' => 'string|max:1000',
            'link_publikasi' => 'string|max:100',
            'surat_tugas' => 'file|mimes:pdf|max:2048',
            'laporan_kegiatan' => 'file|mimes:pdf|max:2048',
        ]);

        // Kondisi jika surat tugas dan laporan kegiatan di upload
        if($request->hasFile('surat_tugas') && $request->hasFile('laporan_kegiatan')) {
            
            // upload surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/pengabdian/surat_tugas', $surat_tugas->hashName());

            // upload laporan kegiatan
            $laporan_kegiataan = $request->file('laporan_kegiatan');
            $laporan_kegiataan->storeAs('public/dosen/pengabdian/laporan_kegiatan', $laporan_kegiataan->hashName());

            // Create Pengabdian
            Pengabdian::create([
                'judul_pengabdian' => $request->judul_pengabdian,
                'bidang_keilmuan' => $request->bidang_keilmuan,
                'latar_belakang' => $request->latar_belakang,
                'manfaat' => $request->manfaat,
                'sasaran' => $request->sasaran,
                'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
                'biaya_kegiatan' => $request->biaya_kegiatan,
                'target' => $request->kelompok_target,
                'kendala' => $request->kendala,
                'hasil' => $request->hasil,
                'evaluasi' => $request->evaluasi,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'laporan_kegiatan' => $laporan_kegiataan->hashName(),
                'user_id' => $id
            ]);

        } else if($request->hasFile('surat_tugas')) {
            
            // upload surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/pengabdian/surat_tugas', $surat_tugas->hashName());

            // Create Pengabdian
            Pengabdian::create([
                'judul_pengabdian' => $request->judul_pengabdian,
                'bidang_keilmuan' => $request->bidang_keilmuan,
                'latar_belakang' => $request->latar_belakang,
                'manfaat' => $request->manfaat,
                'sasaran' => $request->sasaran,
                'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
                'biaya_kegiatan' => $request->biaya_kegiatan,
                'target' => $request->kelompok_target,
                'kendala' => $request->kendala,
                'hasil' => $request->hasil,
                'evaluasi' => $request->evaluasi,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'user_id' => $id
            ]);

        } else if($request->hasFile('laporan_kegiatan')) {
            
            // upload laporan kegiatan
            $laporan_kegiataan = $request->file('laporan_kegiatan');
            $laporan_kegiataan->storeAs('public/dosen/pengabdian/laporan_kegiatan', $laporan_kegiataan->hashName());

            // Create Pengabdian
            Pengabdian::create([
                'judul_pengabdian' => $request->judul_pengabdian,
                'bidang_keilmuan' => $request->bidang_keilmuan,
                'latar_belakang' => $request->latar_belakang,
                'manfaat' => $request->manfaat,
                'sasaran' => $request->sasaran,
                'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
                'biaya_kegiatan' => $request->biaya_kegiatan,
                'target' => $request->kelompok_target,
                'kendala' => $request->kendala,
                'hasil' => $request->hasil,
                'evaluasi' => $request->evaluasi,
                'link_publikasi' => $request->link_publikasi,
                'laporan_kegiatan' => $laporan_kegiataan->hashName(),
                'user_id' => $id
            ]);

        } else {
            // Create Pengabdian
            Pengabdian::create([
                'judul_pengabdian' => $request->judul_pengabdian,
                'bidang_keilmuan' => $request->bidang_keilmuan,
                'latar_belakang' => $request->latar_belakang,
                'manfaat' => $request->manfaat,
                'sasaran' => $request->sasaran,
                'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
                'biaya_kegiatan' => $request->biaya_kegiatan,
                'target' => $request->kelompok_target,
                'kendala' => $request->kendala,
                'hasil' => $request->hasil,
                'evaluasi' => $request->evaluasi,
                'link_publikasi' => $request->link_publikasi,
                'user_id' => $id
            ]);
        }

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function edit_pengabdian($user_id, $id) {

        $user = User::findOrFail($user_id);
        $pengabdian = Pengabdian::findOrFail($id);

        return view('akademik.dosen.pengabdian.edit', [
            'user' => $user,
            'pengabdian' => $pengabdian
        ]);

    }

    public function update_pengabdian(Request $request, $user_id, $id) {

        $pengabdian= Pengabdian::findOrFail($id);
        // dd($pengajaran->bukti_presensi);

        // validasi form
        $this->validate($request, [
            'judul_pengabdian' => 'required|string|max:255',
            'bidang_keilmuan' => 'required|string|max:255',
            'latar_belakang' => 'required|string|max:255',
            'manfaat' => 'required|string|max:255',
            'sasaran' => 'required|string|max:255',
            'tahun_pelaksanaan' => 'required|string|max:255',
            'lama_kegiatan' => 'required|string|max:255',
            'lokasi_pelaksanaan' => 'required|string|max:255',
            'biaya_kegiatan' => 'string|max:100',
            'kelompok_target' => 'required|string|max:255',
            'kendala' => 'string|max:1000',
            'hasil' => 'required|string|max:1000',
            'evaluasi' => 'required|string|max:1000',
            'link_publikasi' => 'string|max:100',
            'surat_tugas' => 'file|mimes:pdf|max:2048',
            'laporan_kegiatan' => 'file|mimes:pdf|max:2048',
        ]);

        // Get Id User
        $user = User::findOrFail($user_id);

        // Kondisi jika surat tugas dan laporan kegiatan di upload
        if($request->hasFile('surat_tugas') && $request->hasFile('laporan_kegiatan')) {
            
            // upload surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/pengabdian/surat_tugas', $surat_tugas->hashName());

            // upload laporan kegiatan
            $laporan_kegiataan = $request->file('laporan_kegiatan');
            $laporan_kegiataan->storeAs('public/dosen/pengabdian/laporan_kegiatan', $laporan_kegiataan->hashName());

            // Hapus file terdahulu
            Storage::delete('public/dosen/pengabdian/surat_tugas/'. $pengabdian->surat_tugas);
            Storage::delete('public/dosen/pengabdian/laporan_kegiatan/'. $pengabdian->laporan_kegiatan);

            // Update Pengabdian
            $pengabdian->update([
                'judul_pengabdian' => $request->judul_pengabdian,
                'bidang_keilmuan' => $request->bidang_keilmuan,
                'latar_belakang' => $request->latar_belakang,
                'manfaat' => $request->manfaat,
                'sasaran' => $request->sasaran,
                'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
                'biaya_kegiatan' => $request->biaya_kegiatan,
                'target' => $request->kelompok_target,
                'kendala' => $request->kendala,
                'hasil' => $request->hasil,
                'evaluasi' => $request->evaluasi,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'laporan_kegiatan' => $laporan_kegiataan->hashName(),
                'user_id' => $user->id
            ]);

        } else if($request->hasFile('surat_tugas')) {
            
            // upload surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/pengabdian/surat_tugas', $surat_tugas->hashName());

            // Hapus file terdahulu
            Storage::delete('public/dosen/pengabdian/surat_tugas/'. $pengabdian->surat_tugas);

            // Create Pengabdian
            $pengabdian->update([
                'judul_pengabdian' => $request->judul_pengabdian,
                'bidang_keilmuan' => $request->bidang_keilmuan,
                'latar_belakang' => $request->latar_belakang,
                'manfaat' => $request->manfaat,
                'sasaran' => $request->sasaran,
                'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
                'biaya_kegiatan' => $request->biaya_kegiatan,
                'target' => $request->kelompok_target,
                'kendala' => $request->kendala,
                'hasil' => $request->hasil,
                'evaluasi' => $request->evaluasi,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'user_id' => $user->id
            ]);

        } else if($request->hasFile('laporan_kegiatan')) {
            
            // upload laporan kegiatan
            $laporan_kegiataan = $request->file('laporan_kegiatan');
            $laporan_kegiataan->storeAs('public/dosen/pengabdian/laporan_kegiatan', $laporan_kegiataan->hashName());

            // Hapus file terdahulu
            Storage::delete('public/dosen/pengabdian/laporan_kegiatan/'. $pengabdian->laporan_kegiatan);

            // Update Pengabdian
            $pengabdian->update([
                'judul_pengabdian' => $request->judul_pengabdian,
                'bidang_keilmuan' => $request->bidang_keilmuan,
                'latar_belakang' => $request->latar_belakang,
                'manfaat' => $request->manfaat,
                'sasaran' => $request->sasaran,
                'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
                'biaya_kegiatan' => $request->biaya_kegiatan,
                'target' => $request->kelompok_target,
                'kendala' => $request->kendala,
                'hasil' => $request->hasil,
                'evaluasi' => $request->evaluasi,
                'link_publikasi' => $request->link_publikasi,
                'laporan_kegiatan' => $laporan_kegiataan->hashName(),
                'user_id' => $user->id
            ]);

        } else {

            // Update Pengabdian
            $pengabdian->update([
                'judul_pengabdian' => $request->judul_pengabdian,
                'bidang_keilmuan' => $request->bidang_keilmuan,
                'latar_belakang' => $request->latar_belakang,
                'manfaat' => $request->manfaat,
                'sasaran' => $request->sasaran,
                'tahun_pelaksanaan' => $request->tahun_pelaksanaan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
                'biaya_kegiatan' => $request->biaya_kegiatan,
                'target' => $request->kelompok_target,
                'kendala' => $request->kendala,
                'hasil' => $request->hasil,
                'evaluasi' => $request->evaluasi,
                'link_publikasi' => $request->link_publikasi,
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy_pengabdian($id) {
        $pengabdian = Pengabdian::findOrFail($id);

        // hapus file surat tugas dan laporan kegiatan
        Storage::delete('public/dosen/pengabdian/surat_tugas/'. $pengabdian->surat_tugas);
        Storage::delete('public/dosen/pengabdian/laporan_kegiatan/'. $pengabdian->laporan_kegiatan);
        
        // hapus pengajaran
        $pengabdian->delete();

        return redirect()->route('dosen.edit', $id)->with(['success' => 'Data Berhasil Didelete!']);
    }

}
