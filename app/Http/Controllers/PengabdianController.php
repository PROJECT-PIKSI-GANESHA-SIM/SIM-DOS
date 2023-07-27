<?php

namespace App\Http\Controllers;

use App\Models\Pengabdian;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengabdianController extends Controller
{
    function index() {

        // Get Id User
        $user = Auth::user();

        $pengabdian = Pengabdian::where('user_id', $user->id)->paginate(5);
        $pesan = Pesan::all();

        return view('pengabdian.index', [
            'pengabdian' => $pengabdian,
            'pesan' => $pesan,
            'user' => $user
        ]);
    }

    function create() {
        $user = Auth::user();
        return view('pengabdian.create', [
            'user' => $user
        ]);
    }

    public function store(Request $request) {
        
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
        $user = Auth::user();

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
                'user_id' => $user->id
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
                'user_id' => $user->id
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
                'user_id' => $user->id
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
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('pengabdian')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function edit_pengabdian($user_id, $id) {

        $user = User::findOrFail($user_id);
        $pengabdian = Pengabdian::findOrFail($id);

        return view('akademik.dosen.pengabdian.edit', [
            'pengabdian' => $pengabdian,
            'user' => $user
        ]);
    }

    public function view($id) {
        $pengabdian = Pengabdian::findOrFail($id);
        $user = Auth::user();

        return view('pengabdian.view', [
            'pengabdian' => $pengabdian,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id) {

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
        $user = Auth::user();

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

        return redirect()->route('pengabdian')->with(['success' => 'Data Berhasil Disimpan!']);


    }

    public function destroy($id) {
        $pengabdian = Pengabdian::findOrFail($id);

        // hapus file surat tugas dan laporan kegiatan
        Storage::delete('public/dosen/pengabdian/surat_tugas/'. $pengabdian->surat_tugas);
        Storage::delete('public/dosen/pengabdian/laporan_kegiatan/'. $pengabdian->laporan_kegiatan);
        
        // hapus pengajaran
        $pengabdian->delete();

        return redirect()->route('pengabdian')->with(['success' => 'Data Berhasil Didelete!']);
    }
}
