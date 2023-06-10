<?php

namespace App\Http\Controllers;

use App\Models\Pengajaran;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajaranController extends Controller
{
    public function index() {
        
        // Get Id User
        $user = Auth::user();

        $pengajaran = Pengajaran::where('user_id', $user->id)->get();

        return view('pengajaran.index', compact('pengajaran'));
    }

    public function create() {

        $program_studi = ProgramStudi::all();

        return view('pengajaran.create', [
            'program_studi' => $program_studi
        ]);
    }

    public function store(Request $request) {

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
            
            // Get Id User
            $user = Auth::user();

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
                'user_id' => $user->id,
            ]);

        } else if ($request->hasFile('bukti_pengajaran')) {
            // kondisi jika hanya bukti pengajaran saja yang di uplaod

            // upload bukti pengajaran
            $bukti_pengajaran = $request->file('bukti_pengajaran');
            $bukti_pengajaran->storeAs('public/dosen/pengajaran/bukti_pengajaran', $bukti_pengajaran->hashName());
        
            // Get Id User
            $user = Auth::user();

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
                'user_id' => $user->id,
            ]);

        } else if($request->hasFile('bukti_presensi')) {
            // kondisi jika hanya bukti presensi saja yang di upload

            // upload bukti presensi
            $bukti_presensi = $request->file('bukti_presensi');
            $bukti_presensi->storeAs('public/dosen/pengajaran/bukti_presensi', $bukti_presensi->hashName());

            // Get Id User
            $user = Auth::user();

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
                'user_id' => $user->id,
            ]);

        } else {

            // kondisi jika tidak mengupload bukti pengajaran dan bukti presensi

            // Get Id User
            $user = Auth::user();

            // Create Pengajaran
            Pengajaran::create([
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

        return redirect()->route('pengajaran')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id) {
        
        $pengajaran = Pengajaran::findOrFail($id);
        $program_studi = ProgramStudi::all();

        return view('pengajaran.edit', [
            'pengajaran' => $pengajaran,
            'program_studi' => $program_studi
        ]);
    }

    public function update(Request $request, Pengajaran $pengajaran) {
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
        
        // check if all image is uploaded

        if($request->hasFile('bukti_pengajaran') && $request->hasFile('bukti_presensi')) {
            
            $bukti_pengajaran = $request->file('bukti_pengajaran');
            $bukti_pengajaran->storeAs('public/dosen/pengajaran/bukti_pengajaran', $bukti_pengajaran->hashName());
            
            // upload bukti presensi
            $bukti_presensi = $request->file('bukti_presensi');
            $bukti_presensi->storeAs('public/dosen/pengajaran/bukti_presensi', $bukti_presensi->hashName());


            // hapus image terdahulu
            Storage::delete('public/dosen/pengajaran/bukti_pengajaran/'.$pengajaran->bukti_pengajaran);
            Storage::delete('public/dosen/pengajaran/bukti_presensi/'.$pengajaran->bukti_presensi);
        
            // Update pengajaran dengan gambar terbaru
            $pengajaran->update([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'bukti_pengajaran' => $bukti_pengajaran->hashName(),
                'bukti_presensi' => $bukti_presensi->hashName()
            ]);

        } else if ($request->hasFile('bukti_pengajaran')) {
            // hanya upload gambar bukti pengajaran

            // upload bukti pengajaran
            $bukti_pengajaran = $request->file('bukti_pengajaran');
            $bukti_pengajaran->storeAs('public/dosen/pengajaran/bukti_pengajaran', $bukti_pengajaran->hashName());
            
            // hapus gambar bukti pengajaran terdahulu
            Storage::delete('public/dosen/pengajaran/bukti_pengajaran/'.$pengajaran->bukti_pengajaran);
            
            // Update pengajaran dengan gambar terbaru
            $pengajaran->update([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'bukti_pengajaran' => $bukti_pengajaran->hashName()
            ]);

        } else if ($request->hasFile('bukti_presensi')) {
            // hanya upload gambar bukti pengajaran

            // upload bukti presensi
            $bukti_presensi = $request->file('bukti_presensi');
            $bukti_presensi->storeAs('public/dosen/pengajaran/bukti_presensi', $bukti_presensi->hashName());
            
            // hapus gambar bukti pengajaran terdahulu
            Storage::delete('public/dosen/pengajaran/bukti_pengajaran/'.$pengajaran->bukti_pengajaran);
            
            // Update pengajaran dengan gambar terbaru
            $pengajaran->update([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
                'bukti_presensi' => $bukti_presensi->hashName()
            ]);

        } else {
            // Tidak Upload gambar
            
            // Update pengajaran tanpa gambar
            $pengajaran->update([
                'tahun_ajaran' => $request->tahun_ajar,
                'program_studi' => $request->program_studi,
                'nama_mata_kuliah' => $request->matkul,
                'jenis_mata_kuliah' => $request->jenis_matkul,
                'kelas' => $request->kelas,
                'jumlah_sks' => $request->sks,
                'jumlah_mahasiswa' => $request->jumlah_mahasiswa
            ]);
            
        }

        return redirect()->route('pengajaran')->with(['success' => 'Data Berhasil DiUpdate!']);
    }
}
