<?php

namespace App\Http\Controllers;

use App\Models\Pengajaran;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('pengajaran')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
